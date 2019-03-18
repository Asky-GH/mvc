<?php

namespace Controllers;

class MainController
{
    public function index()
    {
        require 'views/main.php';
    }

    public function about()
    {
        require 'views/about.php';
    }
}

