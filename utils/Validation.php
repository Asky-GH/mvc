<?php

namespace Utils;

class Validation
{
    public static function validateSignInParameters($errors)
    {
        if (! isset($_POST['username']) || ! $_POST['password']) {
            array_push($errors, 'Invalid username or password.');
        }

        return $errors;
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
        $username = $_POST['username'];

        if (mb_strlen(trim($username)) < 3 || mb_strlen(trim($username)) > 45) {
            array_push($errors, 'Username length must be at least 3 and at most 45 characters long.');
        }

        return $errors;
    }

    public static function validateEmail($errors)
    {
        $email = $_POST['email'];

        if (mb_strlen(trim($email)) < 5 || mb_strlen(trim($email)) > 45) {
            array_push($errors, 'Email length must be at least 5 and at most 45 characters long.');
        } elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, 'Invalid email address.');
        }

        return $errors;
    }

    public static function validateDescription($errors)
    {
        if (mb_strlen(trim($_POST['description'])) < 10) {
            array_push($errors, 'Description length must be at least 10 characters long.');
        }

        return $errors;
    }
}

