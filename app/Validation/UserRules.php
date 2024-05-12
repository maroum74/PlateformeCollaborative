<?php

namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool|string
    {
        $model = new UserModel();
        $user = $model->where('email', $data['email'])->first();

        if (!$user) {
            return 'Email not found'; // Message d'erreur si l'email n'est pas trouvé
        }

        if (!password_verify($data['password'], $user['password'])) {
            return 'Invalid password'; // Message d'erreur si le mot de passe est incorrect
        }

        return true; // La validation est réussie
    }
}
