<?php

namespace App\Models;

use  CodeIgniter\Model;

class CategoryModel extends Model
{
    //Nama Tabel
    protected $table ='ps_category';
    //Atribut yang digunakan menjadi primary_key
    protected $primaryKey ='ps_category_id';
}