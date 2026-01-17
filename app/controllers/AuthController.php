<?php

namespace App\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Service\UserService;

class AuthController
{
    // afficher formulaire login
    public function showLogin()
    {
        require __DIR__ . "/../views/login.php";
    }

    // afficher formulaire register
    public function showRegister()
    {
        require __DIR__ . "/../views/register.php";
    }

    // traiter l'inscription
    public function register()
    {
        $fullname = $_POST['fullname'] ?? '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Model
        $user = new User($fullname, $email, $password);

        // Repository
        $repo = new UserRepository($user);

        // Service
        $service = new UserService($repo);

        $message = $service->signUpUserService();

        echo $message;
    }

    // traiter le login
    public function login()
    {
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // ⚠️ mot de passe fake ici (juste pour créer User)
        $user = new User("", $email, $password);

        $repo = new UserRepository($user);
        $service = new UserService($repo);

        $error = $service->loginUserService($password);

        if ($error === null) {
            echo "Login réussi ✅";
        } else {
            echo $error;
        }
    }
}
