<?php

namespace App\Models;


use App\Controllers\Penyewaan;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $useTimestamps = true;
}
