<?php

class Connection
{
    public static function connect()
    {
        return new PDO('mysql:host=127.0.0.1;dbname=mvc', 'root', 'root', 
                            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}

