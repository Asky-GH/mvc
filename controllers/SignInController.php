<?php

class SignInController
{
    public static function index()
    {
        require 'views/sign-in.php';
    }

    public static function signIn()
    {
        $error = Validation::validateSignInParameters();

        if (isset($error)) {
            require 'views/sign-in.php';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = UserDAO::findByUsername($username);

            if (! $user || ! password_verify($password, $user->getPassword())) {
                $error = 'Invalid username or password.';

                require 'views/sign-in.php';
            } else {                
                $_SESSION['user'] = $user;

                header('Location: /tasks');
            }
        }
    }
}

