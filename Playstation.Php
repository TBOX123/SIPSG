<?php

namespace App\Controllers;

use App\Models\PlaystationModel;
use App\Models\CategoryModel;

use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\XLSX;


class Playstation extends BaseController
{
    private $playstationModel, $catModel;
    public function __construct()
    {
        $this->playstationModel = new PlaystationModel();
        $this->catModel = new CategoryModel();
    }

    public function index()
    {
        $dataPlaystation = $this->playstationModel->getPlaystation();
        $data = [

            'title' => 'Data Playstation',
            'result' => $dataPlaystation
        ];
        return view('playstation/index', $data);
    }


    public function detail($slug)
    {
        $dataPlaystation = $this->playstationModel->getPlaystation($slug);
        $data = [

            'title' => 'Detail Playstation',
            'result' => $dataPlaystation
        ];
        return view('playstation/detail', $data);
    }

    public function create()
    {
        session();
        $data = [

            'title' => 'Tambah Playstation',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()

        ];
        return view('playstation/create', $data);
    }









    public function save()
    {
        //Validasi Input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[playstation.nama_ps]',
                'error' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada',
                ]
            ],

            'tipe' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'diskon' => 'permit_empty|decimal',
            'harga' => 'required|numeric',
            'sampul' =>
            [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar Tidak boleh Lebih Dari 1 MB',
                    'is_image' => 'Yang Anda Pilih Bukan Gambar',
                    'mime_in' => 'Yang Anda Pilih Bukan Gambar',
                ]
            ],

        ])) {

            return redirect()->to('/playstation/create')->withInput();
        }

        //Mengambil File sampul
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            $namaFile = $this->defaultImage;
        } else {
            //Generate Nama File
            $namaFile = $fileSampul->getRandomName();
            //Pindahkan ke folder publik
            $fileSampul->move('img', $namaFile);
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->playstationModel->save([
            'nama_ps' => $this->request->getVar('nama'),
            'tipe_ps' => $this->request->getVar('tipe'),
            'warna_ps' => $this->request->getVar('warna'),
            'stock' => $this->request->getVar('stok'),
            'discount' => $this->request->getVar('diskon'),
            'harga_ps' => $this->request->getVar('harga'),
            'ps_category_id' => $this->request->getVar('id_kategori'),
            'slug' => $slug,
            'cover' => $namaFile

        ]);
        session()->setFlashdata("msg", "Data Berhasil Ditambahkan!");
        return redirect()->to('/playstation');
    }





    public function edit($slug)
    {
        $dataPlaystation = $this->playstationModel->getPlaystation($slug);
        // Jika Data PSKosong// 
        if (empty($dataPlaystation)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Nama Playstation  $slug tidak ditemukan !");
        }

        $data = [
            'title' => 'Ubah Playstation ',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataPlaystation

        ];
        return view('playstation/edit', $data);
    }




    public function update($id)
    {
        // Cek Nama PS
        $dataOld = $this->playstationModel->getPlaystation($this->request->getVar('slug'));
        if ($dataOld['nama_ps'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[playstation.nama_ps]';
        }

        //Validasi Data
        if (!$this->validate([
            'nama' => [

                'rules' => $rule_nama,
                'error' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada',
                ]
            ],
            'tipe' => 'required',
            'warna' => 'required',
            'stok' => 'required|integer',
            'diskon' => 'permit_empty|decimal',
            'harga' => 'required|numeric',
            'sampul' =>
            [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                ]
            ]
        ])) {
            return redirect()->to('/playstation/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $namaFileLama = $this->request->getVar('sampullama');
        // Mengambil File Sampul
        $fileSampul = $this->request->getFile('sampul');
        // Cek gambar, apakah masih gambar lama
        if ($fileSampul->getError() == 4) {
            $namaFile = $namaFileLama;
        } else {
            // Generate Nama file
            $namaFile = $fileSampul->getRandomName();
            // Pindahkan File ke Folder img di public 
            $fileSampul->move('img', $namaFile);

            // Jika Sampulnya default
            if ($namaFileLama != $this->defaultImage && $namaFileLama != "") {
                // hapus gambar
                unlink('img/' . $namaFileLama);
            }
        }
        //Membuat String menjadi huruf kecil semua dan spasinya diganti -
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->playstationModel->save([
            'ps_id' => $id,
            'nama_ps' => $this->request->getVar('nama'),
            'tipe_ps' => $this->request->getVar('tipe'),
            'warna_ps' => $this->request->getVar('warna'),
            'stock' => $this->request->getVar('stok'),
            'discount' => $this->request->getVar('diskon'),
            'harga_ps' => $this->request->getVar('harga'),
            'ps_category_id' => $this->request->getVar('id_kategori'),
            'slug' => $slug,
            'cover' => $namaFile

        ]);
        session()->setFlashdata("msg", "Data Berhasil Diubah!");

        return redirect()->to('/playstation');
    }


    public function delete($id)
    {
        $dataPlaystation = $this->playstationModel->find($id);
        $this->playstationModel->delete($id);


        session()->setFlashData("msg", "Data Berhasil Dihapus!");
        return redirect()->to('/playstation');
    }
}
