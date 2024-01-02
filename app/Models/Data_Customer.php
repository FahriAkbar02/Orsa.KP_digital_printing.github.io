<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_Customer extends Model
{
    protected $table = 'data_table';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pelanggan','nama_pelanggan', 'jenis_produk','jenis','ukuran', 'jumlah', 'tanggal','no_tlpn' ,'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
  
}