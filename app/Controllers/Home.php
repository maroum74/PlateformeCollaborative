<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   
        echo view('/inc/header');
        echo view('dashboard');
    }
}
