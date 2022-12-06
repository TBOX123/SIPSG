<?php

namespace App\Models;

use  CodeIgniter\Model;

class CategoryyModel extends Model
{
    //Nama Tabel
    protected $table ='barang_category';
    //Atribut yang digunakan menjadi primary_key
    protected $primaryKey ='barang_category_id';
}