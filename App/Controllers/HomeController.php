<?php


namespace App\Controllers;


class HomeController extends AppController
{

    public function index()
    {
        echo 'index';
        $this->view = 'index';
    }
} 