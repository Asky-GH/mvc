<?php

namespace Controllers;

use Utils\{Authentication, Validation};
use Database\TaskDAO;
use PDOException;

class TaskController
{
    public function show()
    {
        $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'status_id';
        $_SESSION['sortBy'] = $sortBy;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $_SESSION['page'] = $currentPage;

        $limit = 3;
        $offset = ($currentPage - 1) * $limit;
        $numberOfPages = ceil($this->numberOfTasks() / $limit);

        try {
            $tasks = TaskDAO::find($sortBy, $offset, $limit);
        
            require 'views/tasks/show.php';
        } catch (PDOException $e) {
            if (strpos($e->getMessage(), 'Undefined column')) {
                header('Location: /400');
            }
        }
    }

    public function create()
    {
        require 'views/tasks/create.php';
    }

    public function store()
    {
        if (! Authentication::sanitized()) {
            header('Location: /400');
        } else {
            $errors = [];

            $errors = Validation::validateNewTaskParameters($errors);
            $errors = Validation::validateUsername($errors);
            $errors = Validation::validateEmail($errors);
            $errors = Validation::validateDescription($errors);
            
            if (count($errors) > 0) {
                require 'views/tasks/create.php';
            } else {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $description = $_POST['description'];

                TaskDAO::create($username, $email, $description);

                header('Location: /tasks');
            }
        }
    }

    public function edit()
    {
        if (! Authentication::authorized()) {
            header('Location: /403');
        } else {
            $id = $_GET['id'];

            $task = TaskDAO::findById($id);

            require 'views/tasks/edit.php';
        }
    }

    public function update()
    {
        if (! Authentication::sanitized()) {
            header('Location: /400');
        } elseif (! Authentication::authorized()) {
            header('Location: /403');
        } else {
            $id = $_POST['id'];
            $description = $_POST['description'];
            $status = $_POST['status'] ? 2 : 1;

            TaskDAO::update($id, $description, $status);

            header('Location: /tasks');
        }
    }

    protected function numberOfTasks()
    {
        return count(TaskDAO::findAll());
    }
}

