<?php

class Authentication
{
    public static function authorize()
    {
        if (! isset($_SESSION['user'])) {
            header('Location: /403');
        }
    }
}

