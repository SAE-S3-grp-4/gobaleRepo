<?php
namespace controllers;

use models\userModel;

require '../models/userModel.php';

class connexionController
{
    private userModel $model;
    public $errorMessage = '';

    public function __construct()
    {
        $this->model = new userModel('localhost', 'inf2pj_04', 'root', '');
    }

    public function login() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = $_POST['password'];

            $user = $this->model->getUserByUsername($username);

            if ($user && password_verify($password, $user['Mdp_Membre'])) {
                // Start a session and set user data
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['Nom_Membre'];
                // Redirect to a protected page
                header('Location: ../HTML/accueil.html');
                exit();
            } else {
                $this->errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect';
            }
        }
    }
}