<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        $postModel = new \App\Models\DP_Orders_Item();

        $data['post1'] = $postModel->findAll();

        return view('data_pelanggan/note');
    }
    public function login()
    {
        $postModel = new \App\Models\DP_Orders_Item();

        $data['post1'] = $postModel->findAll();

        return view('auth/login');
    }
}
