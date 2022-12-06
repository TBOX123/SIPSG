<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CategoryyModel;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\XLSX;


class Barang extends BaseController
{
    private $barangModel, $cattModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->cattModel = new CategoryyModel();
    }

    public function index()
    {
        $dataBarang = $this->barangModel->getBarang();
        $data = [

            'title' => 'Data Barang',
            'result' => $dataBarang
        ];
        return view('barang/index', $data);
    }


    public function detail($slug)
    {
        $dataBarang = $this->barangModel->getBarang($slug);
        $data = [

            'title' => 'Detail Barang',
            'result' => $dataBarang
        ];
        return view('barang/detail', $data);
    }



    public function create()
    {
        session();
        $data = [

            'title' => 'Tambah Barang',
            'categoryy' => $this->cattModel->findAll(),
            'validation' => \Config\Services::validation()

        ];
        return view('barang/create', $data);
    }




    public function save()
    {
        //Validasi Input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[barang.nama_barang]',
                'error' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada',
                ]
            ],

            'stok' => 'required|integer',
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

            return redirect()->to('/barang/create')->withInput();
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
        $this->barangModel->save([
            'nama_barang' => $this->request->getVar('nama'),
            'stock' => $this->request->getVar('stok'),
            'barang_category_id' => $this->request->getVar('id_kategori'),
            'slug' => $slug,
            'cover' => $namaFile

        ]);
        session()->setFlashdata("msg", "Data Berhasil Ditambahkan!");
        return redirect()->to('/barang');
    }














    public function edit($slug)
    {
        $dataBarang = $this->barangModel->getBarang($slug);
        // Jika Data Bukunya Kosong// 
        if (empty($dataBarang)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Nama Barang $slug tidak ditemukan !");
        }

        $data = [
            'title' => 'Ubah Barang',
            'categoryy' => $this->cattModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataBarang

        ];
        return view('barang/edit', $data);
    }














    public function update($id)
    {
        // Cek Judul
        $dataOld = $this->barangModel->getBarang($this->request->getVar('slug'));
        if ($dataOld['title'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[barang.title]';
        }

        //Validasi Data
        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field}  Barang harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'stok' => 'required|integer',
            'sampul' =>
            [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yanag anda pilih bukan gambar!',
                ]
            ]
        ])) {
            return redirect()->to('/barang/edit/' . $this->request->getVar('slug'))->withInput();
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
        $this->barangModel->save([
            'barang_id' => $id,
            'nama_barang' => $this->request->getVar('nama'),
            'stock' => $this->request->getVar('stok'),
            'barang_category_id' => $this->request->getVar('id_kategori'),
            'slug' => $slug,

        ]);
        session()->setFlashdata("msg", "Data Berhasil Diubah!");

        return redirect()->to('/barang');
    }
    public function delete($id)
    {
        $dataBarang = $this->barangModel->find($id);
        $this->barangModel->delete($id);
        session()->setFlashData("msg", "Data Berhasil Dihapus!");
        return redirect()->to('/barang');
    }
}
