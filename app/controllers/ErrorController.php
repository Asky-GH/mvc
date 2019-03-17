<?php

class ErrorController
{
    public static function forbidden()
    {
        require 'views/errors/403.php';
    }

    public static function notFound()
    {
        require 'views/errors/404.php';
    }

    public static function badRequest()
    {
        require 'views/errors/400.php';
    }
}

