<?php

namespace App\Controllers;

use App\Models\Data_Customer;
use LDAP\Result;

class DataTableController extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); // Perbaikan di sini
        $this->builder = $this->db->table('data_table'); 
    }
    public function index()
    {

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();


        // Query Builders
        
        $this-> builder->select(
            'data_table.id as dataId
            ,id_pelanggan, nama_pelanggan
            , jenis_produk, jumlah
            , tanggal, jenis');
        $query = $this->builder->get();

        $data['data'] =$query->getResult();

        return view('laporan/index',$data);
    }
    public function print($id=0)
    {
        
        $this-> builder->select('data_table.id as dataId,id_pelanggan, nama_pelanggan, jenis_produk, jumlah, tanggal, jenis');
        $this->builder->where('data_table.id', $id);
        $query = $this-> builder->get();
        $data['post1'] =$query->getRow();


        if(empty ($data['post1'])){

        return redirect() ->to('laporan/index');

        }
        return view('laporan/cetak',$data);
    }
}