<?php

namespace Database;

use PDO;

class Connection
{
    public static function connect()
    {
        $db = parse_url(getenv("DATABASE_URL"));
        
        return new PDO("pgsql:" . sprintf(
            "host=%s;port=%s;dbname=%s",
            $db["host"],
            $db["port"],
            ltrim($db["path"], "/")
        ), $db['user'], $db['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}

