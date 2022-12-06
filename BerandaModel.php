<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{



    public function reportTransaksi($tahun)
    {
        return $this->db->table('sale_detail as sd')
            ->select('MONTH(s.created_at) month, SUM(sd.total_price) total')
            ->join('sale s', 'sale_id')
            ->where('YEAR(s.created_at)', $tahun)
            ->groupBy('MONTH(created_at)')
            ->orderBy('MONTH(s.created_at)')
            ->get()->getResultArray();
    }


    public function reportPenyewaan4($tahun, $bulan)
    {

        return $this->db->table('sale_detail as sd')
            ->select('MONTH(s.created_at) month, SUM(sd.amount) total, sd.ps_id ps_id')
            ->join('sale s', 'sale_id')
            ->where('YEAR(s.created_at)', $tahun)
            ->where('MONTH(s.created_at)', $bulan)
            // ->orderBy('MONTH(s.created_at)')
            ->groupBy('sd.ps_id')
            ->get()->getResultArray();
    }


    public function reportCustomer($tahun)
    {
        return $this->db->table('customer')
            ->select('MONTH(created_at) month, COUNT(*) total')
            ->where('YEAR(created_at)', $tahun)
            ->groupBy('MONTH(created_at)')
            ->orderBy('MONTH(created_at)')
            ->get()->getResultArray();
    }
}
