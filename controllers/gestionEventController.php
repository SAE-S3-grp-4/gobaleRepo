<?php

namespace controllers;

use models\eventModel;
require '../models/eventModel.php';

class gestionEventController
{
    private eventModel $model;

    public function __construct()
    {
        $this->model = new eventModel('localhost', 'inf2pj_04', 'root', '');
    }

    public function getEvents() {
        return $this->model->getEvents();
    }

    public function createEvent($title, $description, $date, $price, $places, $end_date) {
        $this->model->addEvent($title, $description, $date, $price, $places, $end_date);
    }

    public function deleteEvent($id) {
        $this->model->deleteEvent($id);
    }
}