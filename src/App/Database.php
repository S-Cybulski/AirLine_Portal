<?php

declare(strict_types= 1);

namespace App;

use PDO;

class Database
{
    public function getConnection(): PDO
    {
        $dsn = "mysql:host=db;dbname=airline_db;charset=utf8";

        $pdo = new PDO($dsn,"root","password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        return $pdo;
    }
}