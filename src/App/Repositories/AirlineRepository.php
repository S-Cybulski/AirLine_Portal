<?php

declare(strict_types= 1);

namespace App\Repositories;

use App\Database;
use PDO;

class AirlineRepository
{
    public function __construct(private Database $database)
    {
    }
    public function getAllPassengers(): array
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->query('SELECT * FROM Passenger');
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}