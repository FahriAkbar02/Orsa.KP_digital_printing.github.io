<?php

namespace App\Models;

use CodeIgniter\Model;

class DP_Orders_item extends Model
{

    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields =
    [
        'id_pelanggan',
        'nama_pelanggan',
        'item_name',
        'jenis_item',
        'size',
        'quantity',
        'no_tlpn',
        'price',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getOrderedData()
    {
        return $this->orderBy('created_at', 'DESC')->findAll(); // atau 'created_at' jika itu yang Anda gunakan
    }
}
