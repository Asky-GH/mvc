<?php

class TaskDAO
{
    public static function findAll()
    {
        $pdo = Connection::connect();

        return $pdo->query('select * from tasks', PDO::FETCH_CLASS, 'Task');
    }

    public static function create($username, $email, $description)
    {
        $pdo = Connection::connect();
        
        $statement = $pdo->prepare('insert into tasks(username, email, description) 
                                    values(:username, :email, :description)');
        $statement->execute([
            ':username' => $username,
            ':email' => $email,
            ':description' => $description
        ]);   
    }

    public static function findById($id)
    {
        $pdo = Connection::connect();
        
        $statement = $pdo->prepare('select * from tasks where id = :id');
        $statement->execute([':id' => $id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Task');
        
        return $statement->fetch();
    }

    public static function update($id, $description, $statusId)
    {
        $pdo = Connection::connect();

        $statement = $pdo->prepare('update tasks set description = :description, 
                                    status_id = :status_id where id = :id');
        $statement->execute([
            ':id' => $id,
            ':description' => $description,
            ':status_id' => $statusId
        ]);
    }
}

