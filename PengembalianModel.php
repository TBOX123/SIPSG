<?php

namespace App\Models;

use  CodeIgniter\Model;



class PengembalianModel extends Model
{
    //Nama Tabel
    protected $table = 'pengembalian';
    //Atribut yang digunakan menjadi primary key
    protected $primaryKey = 'id_pengembalian';
    //Atribut untuk menyimpan created_at dan updated_at
    protected $UseTimestamps = true;
    protected $allowedFields = [
        'id_pengembalian', 'id_customer', 'status', 'stock', 'ps_id', 'sale_id', 'sisa_hari', 'denda',
    ];
    protected $useSoftDeletes = true;



    public function getPengembalian()
    {
        $query =  $this->db->table('pengembalian as pg')
            ->select('pg.id_pengembalian, pg.id_customer,us.id user_id, us.firstname,pg.status status, pg.stock stock,pg.ps_id ps_id,
            pg.sale_id sale_id, pg.sisa_hari sisa_hari,pg.denda,
            us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer, 
            SUM(sd.total_price) total, sd.day day, s.created_at tgl_transaksi,
            ps.ps_category_id ps_category_id')
            ->join('sale s', 's.sale_id = pg.sale_id')
            ->join('sale_detail sd', 'sd.sale_id = pg.sale_id')
            ->join('users us', 'us.id = s.user_id')
            ->join('customer c', 'c.customer_id = pg.id_customer')
            ->join('playstation ps', 'ps.ps_id = sd.ps_id')
            ->groupBy('pg.id_pengembalian');
        return $query->get()->getResultArray();
    }

    public function updatePengembalian($id, $data, $denda)
    {

        $sql = "UPDATE pengembalian SET status = '$data',
                                        denda = '$denda'
                            where id_pengembalian = $id
       ";
        $this->db->query($sql);
        return;
    }
}
