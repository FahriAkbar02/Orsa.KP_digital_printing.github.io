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

    public function filterData($name = '', $startDate = '', $endDate = '')
    {
        if (!empty($name)) {
            $this->like('nama_pelanggan', $name);
        }
        if (!empty($startDate) && !empty($endDate)) {
            $this->where('created_at >=', $startDate)
                ->where('created_at <=', $endDate);
        }
    }
    public function findByDateRange($itemName, $startDate, $endDate)
    {
        return $this->asArray()
            ->where('item_name', $itemName)
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->findAll();
    }
    public function getOrderedData()
    {
        return $this->orderBy('created_at', 'DESC')->findAll(); // atau 'created_at' jika itu yang Anda gunakan
    }
}
