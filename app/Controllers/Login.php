<?php

namespace App\Controllers;


class Login extends BaseController
{
    public function index()
    {
        $postModel = new \App\Models\DP_Orders_Item();

        $data['post1'] = $postModel->findAll();

        return view('auth/login');
    }
}
