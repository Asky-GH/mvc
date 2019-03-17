<?php

class AuthController
{
    public static function index()
    {
        require 'views/sign-in.php';
    }

    public static function signIn()
    {
        Authentication::sanitize();

        $errors = [];

        $errors = Validation::validateSignInParameters($errors);

        if (count($errors) > 0) {
            require 'views/sign-in.php';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = UserDAO::findByUsername($username);

            if (! $user || ! password_verify($password, $user->getPassword())) {
                array_push($errors, 'Invalid username or password.');

                require 'views/sign-in.php';
            } else {                
                $_SESSION['user'] = $user;

                header('Location: /tasks');
            }
        }
    }

    public static function signOut()
    {
        Authentication::sanitize();

        unset($_SESSION['user']);

        header('Location: /');
    }
}

