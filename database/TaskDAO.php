<?php

namespace Database;

use Database\Connection;
use PDO;
use Exception;

class TaskDAO
{
    public static function find($sortBy, $offset, $limit)
    {
        $pdo = Connection::connect();
        
        $statement = $pdo->prepare("select * from tasks order by {$sortBy} 
                                limit :offset, :limit");
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        try {            
            $statement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Models\\Task');
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
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Models\\Task');
        
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

    public static function findAll()
    {
        $pdo = Connection::connect();

        $statement = $pdo->prepare('select * from tasks');
        $statement->execute();
        $tasks =  $statement->fetchAll(PDO::FETCH_CLASS, 'Models\\Task');
        $statement->closeCursor();
        return $tasks;
    }
}

