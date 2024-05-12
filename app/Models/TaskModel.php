<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'task', 'deadline', 'created_by', 'description', 'status'];

    public function getTasksByUserId($user_id)
    {
        return $this->distinct()
            ->select('t.title, t.deadline, user_id, t.description')
            ->from('user_task ut')
            ->join('task t', 'ut.task_id = t.id')
            ->where('ut.user_id', $user_id)
            ->orderBy('t.deadline', 'ASC')
            ->findAll();
    }

    public function getAssignedTasksByUserId($user_id)
    {
        return $this->distinct()
            ->select('t.id, u.profile_picture, u.name, t.title, t.deadline, u.role_id, r.name as role_name, t.description, t.status')
            ->from('task t')
            ->join('user_task ut', 't.id = ut.task_id')
            ->join('users u', 'u.id = t.created_by')
            ->join('role r', 'r.id = u.role_id')
            ->where('ut.user_id', $user_id)
            ->orderBy('t.deadline', 'ASC')
            ->findAll();
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        // Mettre à jour le statut de la tâche dans la base de données
        $data = [
            'status' => $newStatus
        ];

        $this->where('id', $taskId)->set($data)->update();

        // Vous pouvez également ajouter d'autres vérifications ou manipulations ici si nécessaire
    }
}
//public function getAssignedTasksByUserId($user_id)
//{
//        return $this->select('u.profile_picture, u.name, t.task, t.deadline')
//                    ->from('user u, task t')
//                    ->join('user_task ut', 't.id = ut.task_id')
//                    ->join('users u', 'u.id = t.created_by')
//                    ->where('ut.user_id', $user_id)
//                    ->orderBy('t.deadline', 'ASC')
//                    ->findAll();
//    }    