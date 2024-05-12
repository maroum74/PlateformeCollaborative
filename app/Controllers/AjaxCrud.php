<?php

namespace App\Controllers;

use App\Models\AjaxCrudModel;

use monken\TablesIgniter;

class AjaxCrud extends BaseController
{
    function index(){
        return view('home_view');
    }

    function fetch_all(){

        $crudModel = new AjaxCrudModel();

        $data_table = new TablesIgniter();

        $data_table->setTable($crudModel->noticeTable())
        ->setOutput(["id", "name", "last_name", "email", "password", "role_id", "profile_picture"]);

        return $data_table->getDatatable();}
    }
//monken/tablesigniter package

?>