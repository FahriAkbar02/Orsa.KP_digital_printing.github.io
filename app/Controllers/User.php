<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        $users = new \Myth\Auth\Models\UserModel();

        $data['users'] = $users->findAll();
        return view('user/index',$data);
    }
    
}
