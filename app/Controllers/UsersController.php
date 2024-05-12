<?php

namespace App\Controllers;

use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);
        echo view("templates/headernude");
        echo view("login", $data);
    }
    public function login()
    {
        // Validation des données du formulaire de connexion
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/login')->withInput()->with('validation', $this->validator);
        }

        // Vérifier les informations d'identification dans la base de données
        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getVar('email'))->first();

        if (!$user || !password_verify($this->request->getVar('password'), $user['password'])) {
            return redirect()->to('/login')->withInput()->with('error', 'Adresse email ou mot de passe incorrect.');
        }
        

        // Créer une session pour l'utilisateur
        $session = session();
        $session->set([
            'user_id' => $user['id'],
            'email' => $user['email'],
            'logged_in' => true
        ]);

        // Rediriger vers la page d'accueil
        return redirect()->to('/accueil');
    }


    // Endpoint pour ajouter un nouvel utilisateur
public function addUser()
{
    $request = service('request');

    // Récupérer les données du formulaire
    $userData = [
        'name' => $request->getPost('name'),
        'last_name' => $request->getPost('last_name'),
        'email' => $request->getPost('email'),
        'password' => $request->getPost('password'),
        'role_id' => $request->getPost('role_id'),
        'profile_picture' => $request->getPost('profile_picture')
    ];

    // Insérer les données dans la base de données (utiliser votre modèle UserModel)
    $userModel = new UserModel();
    $insertedUserID = $userModel->addUser($userData);

    // Retourner une réponse JSON
    return $this->response->setJSON(['success' => true, 'message' => 'Utilisateur ajouté avec succès', 'insertedUserID' => $insertedUserID]);
}

public function updateUser() {

    $request = service('request');

    // Mettre à jour un utilisateur existant
    $userIDToUpdate = $request->getPost('id');
    $userDataToUpdate = [
        'name' => $request->getPost('name'),
        'last_name' => $request->getPost('last_name'),
        'email' => $request->getPost('email'),
        'password' => $request->getPost('password'),
        'role_id' => $request->getPost('role_id'),
        'profile_picture' => $request->getPost('profile_picture')
    ];
    $userModel = new UserModel();
    $updatedUserID = $userModel->updateUser($userIDToUpdate, $userDataToUpdate);
    echo "Utilisateur avec l'ID $userIDToUpdate mis à jour<br>";
}
public function deleteUser()
{
    $request = service('request');
    $userIDToDelete = $request->getPost('id');
    
    // Vérifier si l'ID de l'utilisateur est valide
    if (!empty($userIDToDelete)) {
        $userModel = new UserModel();
        $userModel->deleteUser($userIDToDelete);
        return $this->response->setJSON(['success' => true]);
    } else {
        // Retourner une réponse d'erreur si l'ID de l'utilisateur est manquant
        return $this->response->setJSON(['success' => false, 'message' => 'ID de l\'utilisateur invalide']);
    }
}

}

