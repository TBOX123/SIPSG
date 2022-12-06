<?php

namespace App\Models;

use  CodeIgniter\Model;



class PlaystationModel extends Model
{
   //Nama Tabel
   protected $table = 'playstation';
   //Atribut yang digunakan menjadi primary key
   protected $primaryKey = 'ps_id';
   //Atribut untuk menyimpan created_at dan updated_at
   protected $UseTimestamps = true;
   protected $allowedFields = [
      'slug', 'nama_ps', 'tipe_ps', 'harga_ps',
      'warna_ps', 'stock', 'discount', 'cover', 'ps_category_id',
   ];
   protected $useSoftDeletes = true;



   public function getPlaystation($slug = false)
   {
      $query =  $this->table('playstation as ps')
         ->join('ps_category', 'ps_category_id')
         ->where('deleted_at is null');
      if ($slug == false)

         return $query->get()->getResultArray();
      return $query->where(['slug' => $slug])->first();
   }

   public function updatePlaystation($id, $data)
   {
      $sql = "UPDATE playstation SET `stock` =  stock + $data
               where ps_id = $id
               ";
      $this->db->query($sql);
      return;
   }
}
