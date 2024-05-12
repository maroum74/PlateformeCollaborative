<?php

namespace App\Controllers;

use App\Models\UserModel;

class HomeController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->getUsers();
        echo view('/templates/header');
        return view('home_view', $data);
    }
}
