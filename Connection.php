<?php

class Connection
{
    public static function connect()
    {
        try {
            return new PDO('mysql:host=127.0.0.1;dbname=tasks', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            echo 'Service temporarily unavailable. Please try later.';
        }
    }
}

