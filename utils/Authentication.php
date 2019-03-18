<?php

namespace Utils;

class Authentication
{
    public static function authorize()
    {
        if (! isset($_SESSION['user'])) {
            header('Location: /403');
        }
    }

    public static function sanitize()
    {
        $csrfToken = isset($_POST['csrfToken']) ? $_POST['csrfToken'] : 'BAD REQUEST!';
        
        if (! $csrfToken === $_SESSION['csrf']) {
            header('Location: /404');
        }
    }
}

