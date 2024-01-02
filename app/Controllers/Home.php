<?php

namespace App\Controllers;
use App\Models\Data_table;

class Home extends BaseController
{
    public function index()
    {
        $postModel = new \App\Models\Data_Customer();

        $data['post1'] = $postModel->findAll();
      
        return view('user/index');
    }
    
}
