<?php

namespace Utils;

class Authentication
{
    public static function authorized()
    {
        return isset($_SESSION['user']);
    }

    public static function sanitized()
    {
        $csrfToken = isset($_POST['csrfToken']) ? $_POST['csrfToken'] : 'BAD REQUEST!';
        
        return $csrfToken === $_SESSION['csrf'];
    }
}

