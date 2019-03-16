<?php

class ErrorController
{
    public static function forbidden()
    {
        require 'views/403.php';
    }

    public static function notFound()
    {
        require 'views/404.php';
    }
}

