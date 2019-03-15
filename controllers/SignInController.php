<?php

require 'QueryBuilder.php';
require 'Connection.php';

class SignInController
{
    public static function index()
    {
        require 'views/sign-in.php';
    }

    public static function signIn()
    {
        $user = QueryBuilder::find(Connection::connect(), 'users', 'User', $_POST['username']);
        if (! $user || ($user->getPassword() !== $_POST['password'])) {
            $error = 'Invalid username or password.';

            require 'views/sign-in.php';
        } else {
            header('Location: /tasks');
        }
    }
}

