<?php

namespace controllers;

use models\userModel;

class inscriptionController
{
    private userModel $model;

    public function __construct()
    {
        $this->model = new userModel('localhost', 'inf2pj_04', 'root', '');
    }

    public function inscription() {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password']) && isset($_POST['group'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            $group = $_POST['group'];

            if ($password === $confirmPassword) {
                $this->model->addUser($email, $password, $group);
            } else {
                echo 'Les mots de passe ne correspondent pas';
            }
        }
    }
}