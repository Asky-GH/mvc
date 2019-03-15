<?php

require 'models/User.php';

class QueryBuilder
{
    public static function find($pdo, $table, $class, $username)
    {
        try {
            $statement = $pdo->prepare("select * from {$table} where username = :username");
            $statement->execute(array(':username' => $username));
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            return $statement->fetch();
        } catch (PDOException $e) {
            echo 'Service temporarily unavailable. Please try later.';
        } finally {
            $statement = null;
            $pdo = null;
        }   
    }
}

