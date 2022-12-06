<?php

namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Customer extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();
        $crud->setTable('customer');
        $crud->setLanguage('indonesian');

        $crud->displayAs(array(
            'nama_customer' => 'Nama',
            'no_customer' => 'NIK KTP',
            'alamat' => 'Alamat',
            'no_telepon' => 'Telp',
        ));


        $crud->setRule('nama_customer', 'Nama', 'required', [
            'required' => '{field} harus diisi!'
        ]);

        // $crud->where('deleted_at', null);
        // $crud->columns(['name', 'no_customer', 'gender', 'address', 'email', 'phone']);
        // $crud->unsetColumns(['created_at', 'updated_at']);

        // $crud->unsetAdd(); // Menonaktifkan tombol Tambah Data
        // $crud->unsetEdit(); // Menonaktifkan tombol Ubah Data
        // $crud->unsetDelete(); // Menonaktifkan tombol Hapus Data
        // $crud->unsetExport(); // Menonaktifkan tombol Export Data
        // $crud->unsetPrint(); // Menonaktifkan tombol Print Data


        // $crud->setTheme('datatables');

        // $crud->setRelation('officeCode', 'offices', 'city')

        $output = $crud->render();

        $data = [
            'title' => 'Data Customer',
            'result' => $output
        ];
        return view('customer/index', $data);
    }
}
