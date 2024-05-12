<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\TaskModel;

class AccueilController extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $userModel = new UserModel();
        $data['users'] = $userModel->getUsers();
        // Récupérer les tâches de l'utilisateur courant
        $userId = 4; // Remplacez user_id par l'ID de l'utilisateur courant
        $data['tasks'] = $taskModel->getTasksByUserId($userId);
        // Récupérer les tâches attribuées à d'autres utilisateurs
        $data['assignedTasks'] = $taskModel->getAssignedTasksByUserId($userId);
        $data['userId'] = $userId;
        echo view('/templates/header');
        return view('tasks', $data);
    }
}
