<?php

namespace App\Controllers;

use App\Models\UserModel;

class ListeController extends BaseController
{
    public function index()
    {   
        $userModel = new UserModel();
        $data['users'] = $userModel->getUsers();

        echo view('/templates/header');
        return view('dashboard', $data );
    }
}
