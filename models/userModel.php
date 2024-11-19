<?php

namespace models;

use PDO;
use PDOException;

class userModel
{
    private PDO $bdd;
    public function __construct($host, $dbname, $user, $password) {
        try {
            $this->bdd = new PDO(
                'mysql:host=localhost;dbname=inf2pj_04;charset=utf8',
                'root',
                ''
            );
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function  getUsr($id) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE id = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function addUser($email, $password, $group)
    {
        $req = $this->bdd->prepare('INSERT INTO user (email, password, group) VALUES (:email, :password, :group)');
        $req->execute(array(
            'email' => $email,
            'password' => $password,
            'group' => $group
        ));
    }
}