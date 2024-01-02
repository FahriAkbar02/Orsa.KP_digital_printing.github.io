<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data_Customer;

class DataTableController extends BaseController
{
    public function index()
    {
        $pelangganModel = new Data_Customer();
        $data['posts'] = $pelangganModel->findAll();
        return view('laporan/index', $data);
    }

    public function create()
    {
        return view('data_pelanggan/note');
    }

    public function store()
    {
        $randomId= uniqid('TAP-');
        $data = [
            'id_pelanggan' => $randomId,
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'jenis_produk' => $this->request->getPost('jenis_produk'),
            'jenis' => $this->request->getPost('jenis'),
            'ukuran' => $this->request->getPost('ukuran'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
            'no_tlpn' => $this->request->getPost('no_tlpn'),
        ];

        $pelangganModel = new Data_Customer();
        $pelangganModel->save($data);

        return redirect()->to('laporan')->with('success', 'Data pelanggan berhasil disimpan.');
    }

    public function edit($id)
    {
        $pelangganModel = new Data_Customer();
        $pelanggan = $pelangganModel->find($id);

        if (!$pelanggan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pelanggan tidak ditemukan');
        }

        return view('pelanggan/edit', ['pelanggan' => $pelanggan]);
    }

    public function update($id)
    {
        $pelangganModel = new Data_Customer();
        $pelanggan = $pelangganModel->find($id);

        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan.');
        }

        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'jenis_produk' => $this->request->getPost('jenis_produk'),
            'jenis' => $this->request->getPost('jenis'),
            'ukuran' => $this->request->getPost('ukuran'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
            'no_tlpn' => $this->request->getPost('no_tlpn'),
        ];

        $pelangganModel->update($id, $data);

        return redirect()->to('/pelanggan')->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $pelangganModel = new Data_Customer();
        if ($pelangganModel->delete($id)) {
            return redirect()->to('laporan')->with('success', 'Data Pelanggan berhasil dihapus.');
        } else {
            return redirect()->to('/pelanggan')->with('error', 'Data Pelanggan tidak ditemukan.');
        }
    }
    public function data()
    {
      
            return view('data_pelanggan/data');
    }
}
