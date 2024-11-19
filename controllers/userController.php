<?php

namespace controllers;

use models\userModel;

class userController
{
    private userModel $model;

    public function __construct()
    {
        $this->model = new userModel();
    }
}