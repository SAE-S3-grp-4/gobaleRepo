<?php

namespace models;

use PDO;
use PDOException;

class userModel
{
    private PDO $bdd;
    public function __construct() {
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
}