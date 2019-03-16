<?php

class Validation
{
    public static function validateSignInParameters()
    {
        if (! isset($_POST['username']) || ! $_POST['password']) {
            return 'Invalid username or password.';
        }
    }

    public static function validateNewTaskParameters($errors)
    {
        if (! isset($_POST['username']) || ! $_POST['email'] || ! $_POST['description']) {
            array_push($errors, 'Please, fill all fields.');
        }

        return $errors;
    }

    public static function validateUsername($errors)
    {
        if (mb_strlen($_POST['username']) < 3 || mb_strlen($_POST['username']) > 45) {
            array_push($errors, 'Username length must be at least 3 and at most 45 characters long.');
        }

        return $errors;
    }

    public static function validateEmail($errors)
    {
        if (mb_strlen($_POST['email']) < 5 || mb_strlen($_POST['email']) > 45) {
            array_push($errors, 'Email length must be at least 5 and at most 45 characters long.');
        }

        return $errors;
    }

    public static function validateDescription($errors)
    {
        if (mb_strlen($_POST['description']) < 10) {
            array_push($errors, 'Description length must be at least 10 characters long.');
        }

        return $errors;
    }
}

