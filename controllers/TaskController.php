<?php

class TaskController
{
    public static function show()
    {
        session_start();
        $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'status_id';
        $_SESSION['sortBy'] = $sortBy;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $_SESSION['page'] = $currentPage;

        $limit = 3;
        $offset = ($currentPage - 1) * $limit;
        $numberOfPages = ceil(static::numberOfTasks() / $limit);

        try {
            $tasks = TaskDAO::find($sortBy, $offset, $limit);
        } catch (PDOException $e) {
            if (strpos($e->getMessage(), 'Column not found')) {
                header('Location: /404');
            }
        }
        
        require 'views/tasks/show.php';
    }

    public static function create()
    {
        require 'views/tasks/create.php';
    }

    public static function store()
    {
        $errors = [];

        $errors = static::validateParameters($errors);
        $errors = static::validateUsername($errors);
        $errors = static::validateEmail($errors);
        $errors = static::validateDescription($errors);
        
        if (count($errors) > 0) {
            static::returnError($errors);
        } else {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $description = $_POST['description'];

            TaskDAO::create($username, $email, $description);

            header('Location: /tasks');
        }
    }

    public static function edit()
    {
        static::auth();

        $id = $_GET['id'];

        $task = TaskDAO::findById($id);

        require 'views/tasks/edit.php';
    }

    public static function update()
    {
        static::auth();

        $id = $_POST['id'];
        $description = $_POST['description'];
        $status = $_POST['status'] ? 2 : 1;

        TaskDAO::update($id, $description, $status);

        header('Location: /tasks');
    }

    protected static function auth()
    {
        session_start();
        if (! isset($_SESSION['user'])) {
            header('Location: /403');
        }
    }

    protected static function numberOfTasks()
    {
        return count(TaskDAO::findAll());
    }

    protected static function validateParameters($errors)
    {
        if (! isset($_POST['username']) || ! $_POST['email'] || ! $_POST['description']) {
            array_push($errors, 'Please, fill all fields.');
        }
        return $errors;
    }

    protected static function validateUsername($errors)
    {
        if (mb_strlen($_POST['username']) < 3 || mb_strlen($_POST['username']) > 45) {
            array_push($errors, 'Username length must be at least 3 and at most 45 characters long.');
        }
        return $errors;
    }

    protected static function validateEmail($errors)
    {
        if (mb_strlen($_POST['email']) < 5 || mb_strlen($_POST['email']) > 45) {
            array_push($errors, 'Email length must be at least 5 and at most 45 characters long.');
        }
        return $errors;
    }

    protected static function validateDescription($errors)
    {
        if (mb_strlen($_POST['description']) < 10) {
            array_push($errors, 'Description length must be at least 10 characters long.');
        }
        return $errors;
    }

    protected static function returnError($errors)
    {
        $error = $errors[0];

        require 'views/tasks/create.php';
    }
}

