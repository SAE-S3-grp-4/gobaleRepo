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
}