<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {

        return view('data_pelanggan/note');
    }
    public function login()
    {


        return view('pelanggan/index');
    }
}
