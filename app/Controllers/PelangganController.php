<?php

namespace App\Controllers;

use App\Helpers\CustomerIdGenerator;

class PelangganController extends BaseController
{
    protected $db;
    protected $builderPelanggan;
    protected $builderPesanan;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builderPelanggan = $this->db->table('pelanggan');
        $this->builderPesanan = $this->db->table('pesanan');
    }

    public function index()
    {
        $name = $this->request->getVar('name');
        $startDate = $this->request->getVar('start_date');
        $endDate = $this->request->getVar('end_date');

        // Menerapkan filter pencarian jika ada
        if (!empty($name)) {
            $this->builderPelanggan->like('nama_pelanggan', $name);
        }
        if (!empty($startDate) && !empty($endDate)) {
            $this->builderPelanggan->where('created_at >=', $startDate);
            $this->builderPelanggan->where('created_at <=', $endDate);
        }

        $data['pelanggan'] = $this->builderPelanggan->get()->getResultArray();

        // Format tanggal jika diperlukan
        foreach ($data['pelanggan'] as &$pelanggan) {
            $pelanggan['created_at'] = date('d-m-Y', strtotime($pelanggan['created_at']));
        }

        // Mengirim data ke view
        return view('pelanggan/index', $data);
    }

    public function tambah()
    {
        return view('pelanggan/tambah');
    }

    // Simpan data pelanggan
    public function simpan()
    {
        $request = service('request');
        $idPelanggan = CustomerIdGenerator::generateCustomerId(); // Menghasilkan ID pelanggan
        $data = [
            'id_pelanggan' => $idPelanggan, // Gunakan ID pelanggan yang dihasilkan
            'nama_pelanggan' => $request->getPost('nama_pelanggan'),
            'Alamat' => $request->getPost('Alamat'),
            'Telepon' => $request->getPost('Telepon'),
        ];

        if ($this->builderPelanggan->insert($data)) {
            return redirect()->to('pelanggan')->with('success', 'Data pelanggan berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    // Simpan data pesanan
    public function simpanPesanan()
    {
        $request = service('request');
        $hargaFormatted = $request->getPost('price');
        $harga = floatval(str_replace('.', '', $hargaFormatted));

        $idPelanggan = $request->getPost('id_pelanggan');

        // Menggunakan builder untuk mengambil data pelanggan berdasarkan id_pelanggan yang baru saja di-generate
        $builderPelanggan = $this->db->table('pelanggan');
        $pelanggan = $builderPelanggan->where('id_pelanggan', $idPelanggan)->get()->getRowArray();

        // Memeriksa apakah pelanggan dengan id_pelanggan yang baru saja di-generate ditemukan
        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan.');
        }

        $data = [
            'id_costomer' => $pelanggan['id_costomer'], // Gunakan id_costomer dari data pelanggan
            'id_pelanggan' => $pelanggan['id_pelanggan'], // Gunakan id_pelanggan dari data pelanggan
            'item_name' => $request->getPost('item_name'),
            'jenis_item' => $request->getPost('jenis_item'),
            'size' => $request->getPost('size'),
            'quantity' => $request->getPost('quantity'),
            'price' => $harga,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->builderPesanan->insert($data)) {
            return redirect()->to('pelanggan')->with('success', 'Data pesanan berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }


    public function delete($id)
    {
        // Check if the data exists
        $data = $this->builderPelanggan->getWhere(['id_costomer' => $id])->getRow();

        if (!$data) {
            return redirect()->to('/')->with('error', 'Data not found');
        }

        // Delete data from the database
        $this->builderPelanggan->where('id_costomer', $id)->delete();

        // Redirect to the homepage or display success message
        return redirect()->to('pelanggan')->with('sukses', 'Data berhasil dihapus');
    }
    public function detailPesanan($id)
    {
        // Mencari data pelanggan berdasarkan ID
        $pelanggan = $this->builderPelanggan->getWhere(['id_costomer' => $id])->getRow();

        // Jika tidak ada data pelanggan, tampilkan pesan kepada pengguna
        if (!$pelanggan) {
            $pesan = 'Pelanggan tidak ditemukan.';
            return view('pelanggan/detail_pesanan', ['pesan' => $pesan]);
        }

        // Mencari data pesanan berdasarkan ID pelanggan
        $pesanan = $this->builderPesanan->where('id_costomer', $id)->get()->getResultArray();

        // Jika tidak ada data pesanan, tampilkan pesan kepada pengguna
        if (!$pesanan) {
            $pesan = 'Belum ada data pesanan untuk pelanggan ini.';
            return view('pelanggan/detail_pesanan', ['pelanggan' => $pelanggan, 'pesan' => $pesan]);
        }

        // Mengirimkan data pelanggan dan pesanan ke tampilan
        $data = [
            'pelanggan' => $pelanggan,
            'pesanan' => $pesanan
        ];

        return view('pelanggan/detail_pesanan', $data);
    }



    public function searchByName()
    {
        $name = $this->request->getVar('name');
        $startDate = $this->request->getVar('start_date');
        $endDate = $this->request->getVar('end_date');

        $where = [];

        // Menerapkan filter pencarian jika ada
        if (!empty($name)) {
            $where['nama_pelanggan LIKE'] = "%$name%";
        }
        if (!empty($startDate) && !empty($endDate)) {
            $where['created_at >='] = $startDate;
            $where['created_at <='] = $endDate;
        }

        // Fetch pelanggan data by name
        $pelanggan = $this->builderPelanggan->where($where)->get()->getResultArray();

        return view('pelanggan/index', ['pelanggan' => $pelanggan]);
    }
}
