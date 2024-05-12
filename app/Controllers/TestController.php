<?php

namespace App\Controllers;

use App\Models\UserModel;

use monken\TablesIgniter;

class TestController extends BaseController
{
    public function index()
    {
        //return view('test');
    }

    //function fetch_all()
    //{

        //$crudModel = new UserModel();

        //$data_table = new TablesIgniter();

        //$data_table->setTable($crudModel->noticeTable())
           // ->setOutput(["id", "name", "email"]);

        //return $data_table->getDatatable();
    //}
}
