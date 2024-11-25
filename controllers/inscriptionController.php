<?php
namespace controllers;

use models\userModel;

require '../models/userModel.php';

class inscriptionController
{
    private userModel $model;
    public $errorMessage = '';

    public function __construct()
    {
        $this->model = new userModel('localhost', 'inf2pj_04', 'root', '');
    }

    public function inscription() {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password']) && isset($_POST['group'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            $group = htmlspecialchars($_POST['group']);

            if ($password !== $confirmPassword) {
                $this->errorMessage = 'Les mots de passe ne correspondent pas';
                return;
            }

            if ($this->model->emailExists($email)) {
                $this->errorMessage = 'L\'adresse mail est déjà utilisée';
                return;
            }

            if ($this->model->nameExists($name)) {
                $this->errorMessage = 'Le nom est déjà utilisé';
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->model->addUser($name, $email, $hashedPassword, $group);
        }
    }
}