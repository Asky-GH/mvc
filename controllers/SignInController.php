<?php

class SignInController
{
    public static function index()
    {
        require 'views/sign-in.php';
    }

    public static function signIn()
    {
        if (! static::parametersValid()) {
            static::returnError();
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = UserDAO::findByUsername($username);

            if (! $user || ! password_verify($password, $user->getPassword())) {
                static::returnError();
            } else {
                session_start();
                $_SESSION['user'] = $user;

                header('Location: /tasks');
            }
        }
    }

    protected static function parametersValid()
    {
        if (! isset($_POST['username']) || ! $_POST['password']) {
            return false;
        } else {
            return true;
        }
    }

    protected static function returnError()
    {
        $error = 'Invalid username or password.';

        require 'views/sign-in.php';
    }
}

