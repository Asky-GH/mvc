<?php

class SignInController
{
    public static function index()
    {
        require 'views/sign-in.php';
    }

    public static function signIn()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // TODO validate parameters

        $user = UserDAO::findByUsername($username);

        if (! $user || ! password_verify($password, $user->getPassword())) {
            $error = 'Invalid username or password.';

            require 'views/sign-in.php';
        } else {
            session_start();
            $_SESSION['user'] = $user;

            header('Location: /tasks');
        }
    }
}

