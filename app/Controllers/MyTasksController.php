<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\TaskModel;

class MyTasksController extends BaseController
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
        return view('mytasks', $data);
    }

    public function updateTaskStatus()
{
    $request = service('request');

    // Récupérer l'identifiant de la tâche et le nouveau statut à partir de la requête
    $taskId = $request->getPost('task_id');
    $newStatus = $request->getPost('new_status');

    // Mettre à jour le statut de la tâche dans la base de données
    // (vous devez implémenter cette logique dans votre modèle TaskModel)
    $taskModel = new TaskModel();
    $taskModel->updateTaskStatus($taskId, $newStatus);

    // Retourner une réponse JSON indiquant le succès de l'opération
    return $this->response->setJSON(['success' => true]);
}
public function ajouterTache()
{
    $request = service('request');

    // Récupérer les données du formulaire
    $title = $request->getPost('title');
    $description = $request->getPost('description');
    $role_id = $request->getPost('role_id');

    // Ajoutez ici la logique pour obtenir l'ID de l'utilisateur courant
    // Par exemple, si vous avez une session d'utilisateur active, vous pouvez obtenir l'ID de l'utilisateur à partir de là

    // ID de l'utilisateur courant (c'est un exemple, vous devez implémenter cette logique selon votre application)
    $created_by = 2; // Remplacez 4 par l'ID de l'utilisateur courant

    // Assurez-vous que les données sont valides avant de les enregistrer dans la base de données

    // Enregistrez la nouvelle tâche dans la base de données
    $taskModel = new TaskModel();
    $taskModel->save([
        'title' => $title,
        'description' => $description,
        'status' => 2, // Statut par défaut
        'deadline' => date('Y-m-d'), // Date limite par défaut (aujourd'hui)
        'created_by' => $created_by, // ID de l'utilisateur qui crée la tâche
        'created_at' => date('Y-m-d H:i:s'), // Date et heure de création
    ]);

    // Rediriger l'utilisateur vers une page appropriée après avoir ajouté la tâche
    return redirect()->to('/mestaches');
}

}
