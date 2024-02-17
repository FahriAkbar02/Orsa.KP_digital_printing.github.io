<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;
use App\Helpers\CustomerIdGenerator;
use App\Models\Order_Items;



class OrderController extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('order_items');
    }

    public function index()
    {
        $name = $this->request->getVar('name');
        $startDate = $this->request->getVar('start_date');
        $endDate = $this->request->getVar('end_date');

        // Menerapkan filter pencarian jika ada
        if (!empty($name)) {
            $this->builder->like('nama_pelanggan', $name);
        }
        if (!empty($startDate) && !empty($endDate)) {
            $this->builder->where('created_at >=', $startDate);
            $this->builder->where('created_at <=', $endDate);
        }
        $this->builder->select('order_items.id as order_itemid, order_items.id_pelanggan, order_items.nama_pelanggan, order_items.item_name, order_items.quantity, order_items.jenis_item, order_items.price, order_items.size, order_items.no_tlpn, order_items.created_at, (order_items.quantity * order_items.price) as total_price');
        $query = $this->builder->get();
        $data = $query->getResultArray();

        // Persiapan data ringkasan
        $summary = [];
        foreach ($data as $order) {
            $key = $order['id_pelanggan'] . '-' . $order['item_name'];
            if (!isset($summary[$key])) {
                $summary[$key] = [
                    'id' => $order['order_itemid'],
                    'id_pelanggan' => $order['id_pelanggan'],
                    'nama_pelanggan' => $order['nama_pelanggan'],
                    'item_name' => $order['item_name'],
                    'quantity' => $order['quantity'],
                    'jenis_item' => $order['jenis_item'],
                    'size' => $order['size'],
                    'no_tlpn' => $order['no_tlpn'],
                    'created_at' => $order['created_at'],
                    'price' => $order['price'],

                ];
            }
        }

        // Format tanggal jika diperlukan
        foreach ($data as $key => &$row) {
            $row['created_at'] = date('d-m-Y', strtotime($row['created_at']));
        }

        // Mengirim data ke view
        return view('laporan/index', ['posts' => $data, 'posts' => $summary]);
    }




    public function store()
    {
        $db = Database::connect();
        $builder = $db->table('order_items');

        $request = service('request');
        $hargaFormatted = $request->getPost('price');
        $harga = floatval(str_replace('.', '', $hargaFormatted));

        // Menggunakan CustomerIdGenerator untuk membuat ID pelanggan
        $idPelanggan = CustomerIdGenerator::generateCustomerId();

        $data = [
            'id_pelanggan' => $idPelanggan,
            'nama_pelanggan' => $request->getPost('nama_pelanggan'),
            'jenis_item' => $request->getPost('jenis_item'),
            'item_name' => $request->getPost('item_name'),
            'size' => $request->getPost('size'),
            'quantity' => $request->getPost('quantity'),
            'no_tlpn' => $request->getPost('no_tlpn'),
            'price' => $harga,
        ];

        if ($builder->insert($data)) {
            // Data inserted successfully
            return redirect()->to('laporan')->with('success', 'Data pelanggan berhasil disimpan.');
        } else {
            // Error handling
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function create()
    {
        return view('data_pelanggan/note');
    }



    public function delete($id)
    {
        $db = Database::connect();
        $builder = $db->table('order_items');

        // Check if the data exists
        $data = $builder->where('id', $id)->get()->getRowArray();

        if (!$data) {
            return redirect()->to('/pelanggan')->with('error', 'Data Pelanggan tidak ditemukan.');
        }

        // Perform the deletion
        $builder->where('id', $id)->delete();

        return redirect()->to('laporan')->with('success', 'Data Pelanggan berhasil dihapus.');
    }





    public function printTransaction($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('order_items');
        $builder->where('id', $id); // assuming 'id' is the column name in your table
        $query = $builder->get();

        // Check if the order exists
        if ($query->getNumRows() <= 0) {
            return redirect()->back()->with('error', 'Data Pelanggan tidak ditemukan.');
        }

        $order = $query->getRowArray();

        // Calculate the total price
        $totalHarga = $order['quantity'] * $order['price'];

        return view('data_pelanggan/printPerID', ['order' => $order, 'totalHarga' => $totalHarga]);
    }
    public function findByDateRange()
    {
        $item_name = $this->request->getVar('item_name');
        $startDate = $this->request->getVar('start_date');
        $endDate = $this->request->getVar('end_date');

        $db = \Config\Database::connect();
        $builder = $db->table('order_items');

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
            $builder = $db->table('order_items'); // Reset builder
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
