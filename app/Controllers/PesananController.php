<?php

namespace App\Controllers;


class PesananController extends BaseController
{

    protected $db;
    protected $builderPelanggan;
    protected $builderPesanan;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builderPesanan = $this->db->table('pesanan');
        $this->builderPelanggan = $this->db->table('pelanggan');
    }

    public function index()
    {
        $dataPelanggan = $this->builderPelanggan->get()->getResultArray();
        $dataPesanan = $this->builderPesanan->get()->getResultArray();
        return view('pelanggan/detail_pesanan', ['pesanan' => $dataPesanan, 'pelanggan' => $dataPelanggan]);
    }

    public function tambah()
    {
        helper('form');

        $data1 = $this->builderPelanggan->get()->getResultArray();
        $data2 = $this->builderPelanggan->get()->getResultArray();
        return view('pesanan/tambah', ['pesanan' => $data1, 'pelanggan' => $data2]);
    }

    public function findByDateRange()
    {
        $item_name = $this->request->getVar('item_name');
        $startDate = $this->request->getVar('start_date');
        $endDate = $this->request->getVar('end_date');

        $db = \Config\Database::connect();
        $builder = $db->table('pesanan');

        // Terapkan filter pencarian jika ada
        if (!empty($item_name)) {
            $builder->like('item_name', $item_name);
        }
        if (!empty($startDate) && !empty($endDate)) {
            $builder->where('created_at >=', $startDate);
            $builder->where('created_at <=', $endDate);
        }

        $builder->select('*');
        $query = $builder->get();
        $orders = $query->getResultArray();

        // Jika tidak ada hasil yang ditemukan dan ada kriteria pencarian, ambil semua data
        if (empty($orders) && (!empty($startDate) || !empty($endDate) || !empty($item_name))) {
            $builder = $db->table('pesanan'); // Reset builder
            $builder->select('*');
            $query = $builder->get();
            $orders = $query->getResultArray();
        }

        $itemSummary = $this->processOrders($orders);

        return view('data_pelanggan/print_all', ['itemSummary' => $itemSummary]);
    }

    private function processOrders($orders)
    {
        $itemSummary = [];

        foreach ($orders as $order) {
            $itemName = $order['item_name'];
            // Format tanggal menjadi d-m-Y
            $orderDate = date('d-m-Y', strtotime($order['created_at']));

            if (!isset($itemSummary[$itemName])) {
                $itemSummary[$itemName] = [
                    'jenis_item' => $itemName,
                    'harga_satuan' => $order['price'],
                    'jumlah' => 0,
                    'harga_total' => 0,
                    'details' => []
                ];
            }

            $itemSummary[$itemName]['jumlah'] += $order['quantity'];
            $itemSummary[$itemName]['harga_total'] += $order['quantity'] * $order['price'];

            if (!isset($itemSummary[$itemName]['details'][$orderDate])) {
                $itemSummary[$itemName]['details'][$orderDate] = [
                    'jumlah' => 0,
                    'harga_total' => 0
                ];
            }

            $itemSummary[$itemName]['details'][$orderDate]['jumlah'] += $order['quantity'];
            $itemSummary[$itemName]['details'][$orderDate]['harga_total'] += $order['quantity'] * $order['price'];
        }

        return $itemSummary;
    }
}
