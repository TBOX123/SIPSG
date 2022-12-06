<?php

namespace App\Models;

use  CodeIgniter\Model;



class BarangModel extends Model
{
    //Nama Tabel
    protected $table ='barang';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey ='barang_id';
     //Atribut untuk menyimpan created_at dan updated_at
     protected $UseTimestamps =true;
     protected $allowedFields = [
        'title','slug','nama_barang','stock','cover','barang_category_id' ];
        protected $useSoftDeletes = true;

     

     public function getBarang($slug = false )
     {
         $query =  $this -> table ('barang')
         -> join ('barang_category','barang_category_id')
         -> where('deleted_at is null');
         if ($slug == false )
         
         return $query -> get () -> getResultArray();
         return $query -> where (['slug'=> $slug]) ->first();
     }
     
    }



   