<?php

class TaskController
{
    public static function index()
    {
        $tasks = TaskDAO::findAll();

        require 'views/tasks/index.php';
    }

    public static function create()
    {
        require 'views/tasks/create.php';
    }

    public static function store()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $description = $_POST['description'];

        // TODO validate parameters

        TaskDAO::create($username, $email, $description);

        header('Location: /tasks');
    }

    public static function edit()
    {
        // TODO add auth middleware

        // TODO handle not existing task

        $id = $_GET['id'];

        $task = TaskDAO::findById($id);

        require 'views/tasks/edit.php';
    }

    public static function update()
    {
        // TODO add auth middleware
        
        $id = $_POST['id'];
        $description = $_POST['description'];
        $status = $_POST['status'] ? 2 : 1;

        // TODO validate parameters

        TaskDAO::update($id, $description, $status);

        header('Location: /tasks');
    }
}

