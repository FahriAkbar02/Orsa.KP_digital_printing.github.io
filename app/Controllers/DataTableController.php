<?php

namespace App\Controllers;

use App\Models\Data_Customer;
use LDAP\Result;

class DataTableController extends BaseController
{
    // Tables Menu
    public function index()
    {
        //
        $postModel = new \App\Models\Data_Customer();

        $data['post1'] = $postModel->findAll();

        return view('laporan/index', $data);
    }
    //Note_pesanan
    public function create()
    {

        return view('data_pelanggan/note');
    }

    public function store()
    {
       
        $postModel = new Data_Customer();
        $randomPelangganId = uniqid('TAP-');
        
        $data = [
            'id_pelanggan' => $randomPelangganId,
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'jenis_produk' => $this->request->getPost('jenis_produk'),
            'jenis' => $this->request->getPost('jenis'),
            'ukuran' => $this->request->getPost('ukuran'),
            'jumlah' =>  $this->request->getPost('jumlah'),
            'tanggal' =>  $this->request->getPost('tanggal'),
            'no_tlpn' =>  $this->request->getPost('no_tlpn'),
        ];
        $insertedId = $postModel->insert($data, true);
        session()->setFlashdata('id_pelanggan', $randomPelangganId);
        return redirect()->to('/laporan')->with('success', 'Data berhasil di Simpan');
    }
    
    public function data(): string
    {
      
        return view('data_pelanggan/data');
    }


    public function print($id=0) {
        $this-> builder->select('data_table.id as dataId,id_pelanggan, nama_pelanggan, jenis_produk, jumlah, tanggal, jenis');
        $this->builder->where('data_table.id', $id);
        $query = $this-> builder->get();
        $postModel = new Data_Customer();
        $data['print'] = $postModel->find($id='id');

        return view('laporan/cetak', $data);
    }
}