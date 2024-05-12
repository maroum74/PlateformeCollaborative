<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'last_name', 'email', 'password', 'role_id', 'profile_picture'];

    public function getUsers()
    {
        return $this->findAll();
    }

    public function getUserByID($id)
    {
        return $this->find($id);
    }

    public function addUser($data)
    {
        return $this->insert($data);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
