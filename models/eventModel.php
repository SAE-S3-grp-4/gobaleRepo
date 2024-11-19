<?php

namespace models;

use PDO;
use PDOException;

class eventModel
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

    public function getEvents() {
        $req = $this->bdd->query('SELECT * FROM evenement');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEvent($title, $description, $date, $price, $places, $end_date) {
        $req = $this->bdd->prepare('INSERT INTO evenement (Nom_Event, Description_Event, Date_Event, Prix_Event, Nb_Place_Event, Date_Fin_Inscription) VALUES (:title, :description, :date, :price, :places, :end_date)');
        $req->execute(array(
            'title' => $title,
            'description' => $description,
            'date' => $date,
            'price' => $price,
            'places' => $places,
            'end_date' => $end_date
        ));
    }

    public function deleteEvent($id) {
        $req = $this->bdd->prepare('DELETE FROM evenement WHERE Id_Event = :id');
        $req->execute(array('id' => $id));
    }
}