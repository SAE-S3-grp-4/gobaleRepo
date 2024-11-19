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

    public function getUserByUsername($username) {
        $req = $this->bdd->prepare('SELECT * FROM membre WHERE Mail_Membre = :username OR Nom_Membre = :username');
        $req->execute(array('username' => $username));
        return $req->fetch();
    }

    public function  getUsr($id) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE id = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function addUser($name, $email, $password, $group)
    {
        $req = $this->bdd->prepare('INSERT INTO membre (Nom_Membre, Mail_Membre, Mdp_Membre, Grp_Membre, Id_Role, Id_Grade) VALUES (:name, :email, :password, :group, :role, :grade)');
        $req->execute(array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'group' => $group,
            'role' => 1,
            'grade' => null
        ));
    }

    public function emailExists($email) {
        $req = $this->bdd->prepare('SELECT COUNT(*) FROM membre WHERE Mail_Membre = :email');
        $req->execute(array('email' => $email));
        return $req->fetchColumn() > 0;
    }

    public function nameExists($name) {
        $req = $this->bdd->prepare('SELECT COUNT(*) FROM membre WHERE Nom_Membre = :name');
        $req->execute(array('name' => $name));
        return $req->fetchColumn() > 0;
    }
}