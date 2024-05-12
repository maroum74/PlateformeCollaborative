<?php

namespace App\Models;

use CodeIgniter\Model;

class AjaxCrudModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'last_name', 'email', 'password', 'role_id', 'profile_picture'];

    public function noticeFunction()
    {
        $builder = $this->db->table('users');

        return $builder;
    }
}
