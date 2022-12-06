<?php

namespace App\Models;

use CodeIgniter\Model;


class SaleModel extends Model
{
    // Nama Tabel
    protected $table  = 'sale';
    protected $useTimestamps  = true;
    protected $allowedFields  = ['sale_id', 'user_id', 'customer_id', 'created_at'];

    public function getReport()
    {
        return $this->db->table('sale_detail as sd')
            ->select('s.sale_id, s.created_at tgl_transaksi, us.id user_id, us.firstname,
             us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer,p.nama_ps nama_ps,
             SUM(sd.total_price) total, sd.day day,SUM(sd.amount) as amount ')
            ->join('sale s', 'sale_id')
            ->join('users us', 'us.id = s.user_id')
            ->join('customer c', 'customer_id', 'left')
            ->join('playstation p', 'p.ps_id = sd.ps_id')
            ->groupBy('s.sale_id')
            ->get()->getResultArray();
    }

    public function filterReportP($filter)
    {

        if (!isset($filter)) {

            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.created_at tgl_transaksi, us.id user_id, us.firstname,
             us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer, 
             SUM(sd.total_price) total, sd.day day,SUM(sd.amount) as amount,sd.exam_date as exam_date,p.nama_ps nama_ps')
                ->join('sale s', 'sale_id')
                ->join('users us', 'us.id = s.user_id')
                ->join('customer c', 'customer_id', 'left')
                ->join('playstation p', 'sd.ps_id = p.ps_id')
                ->groupBy('s.sale_id')
                ->get()->getResultArray();
        } else if ($filter == "all") {

            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.created_at tgl_transaksi, us.id user_id, us.firstname,
                     us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer, 
                     SUM(sd.total_price) total, sd.day day,SUM(sd.amount) as amount,sd.exam_date as exam_date,p.nama_ps nama_ps')
                ->join('sale s', 'sale_id')
                ->join('users us', 'us.id = s.user_id')
                ->join('customer c', 'customer_id', 'left')
                ->join('playstation p', 'sd.ps_id = p.ps_id')
                ->groupBy('s.sale_id')
                ->get()->getResultArray();
        } else if ($filter == "harian") {
            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.created_at tgl_transaksi, us.id user_id, us.firstname,
             us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer, 
             SUM(sd.total_price) total, sd.day day,SUM(sd.amount) as amount,sd.exam_date as exam_date,p.nama_ps nama_ps')
                ->join('sale s', 'sale_id')
                ->join('users us', 'us.id = s.user_id')
                ->join('customer c', 'customer_id', 'left')
                ->join('playstation p', 'sd.ps_id = p.ps_id')
                ->groupBy('date(sd.exam_date)')
                ->get()->getResultArray();
        } else if ($filter == "mingguan") {
            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.created_at tgl_transaksi, us.id user_id, us.firstname,
                     us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer, 
                     SUM(sd.total_price) total, sd.day day,SUM(sd.amount) as amount,sd.exam_date as exam_date,p.nama_ps nama_ps')
                ->join('sale s', 'sale_id')
                ->join('users us', 'us.id = s.user_id')
                ->join('customer c', 'customer_id', 'left')
                ->join('playstation p', 'sd.ps_id = p.ps_id')
                ->groupBy('yearweek(sd.exam_date)')
                ->get()->getResultArray();
        } else if ($filter == "bulanan") {
            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.created_at tgl_transaksi, us.id user_id, us.firstname,
             us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer, 
             SUM(sd.total_price) total, sd.day day,SUM(sd.amount) as amount, sd.exam_date as exam_date,p.nama_ps nama_ps')
                ->join('sale s', 'sale_id')
                ->join('users us', 'us.id = s.user_id')
                ->join('customer c', 'customer_id', 'left')
                ->join('playstation p', 'sd.ps_id = p.ps_id')
                ->groupBy('month(sd.exam_date),year(sd.exam_date)')
                ->get()->getResultArray();
        } else if ($filter == "tahunan") {
            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.created_at tgl_transaksi, us.id user_id, us.firstname,
             us.lastname, , us.username, c.customer_id, c.nama_customer name_cust, c.no_customer, 
             SUM(sd.total_price) total, sd.day day,SUM(sd.amount) as amount,sd.exam_date as exam_date,p.nama_ps nama_ps')
                ->join('sale s', 'sale_id')
                ->join('users us', 'us.id = s.user_id')
                ->join('customer c', 'customer_id', 'left')
                ->join('playstation p', 'sd.ps_id = p.ps_id')
                ->groupBy('year(sd.exam_date)')
                ->get()->getResultArray();
        }
    }
}
