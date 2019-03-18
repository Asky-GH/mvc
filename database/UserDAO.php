<?php

namespace Database;

use Database\Connection;
use PDO;

class UserDAO
{
    public static function findByUsername($username)
    {
        $pdo = Connection::connect();

        $statement = $pdo->prepare('select * from users where username = :username');
        $statement->execute([':username' => $username]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');
        
        return $statement->fetch();
    }
}

