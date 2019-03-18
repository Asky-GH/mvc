<?php

namespace Controllers;

class ErrorController
{
    public function badRequest()
    {
        require 'views/errors/400.php';
    }

    public function forbidden()
    {
        require 'views/errors/403.php';
    }

    public function notFound()
    {
        require 'views/errors/404.php';
    }
}

