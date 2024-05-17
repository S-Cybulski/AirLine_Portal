<?php

declare(strict_types= 1);

namespace App\Repositories;

use App\Database;

use PDO;

class UserRepository
{
    public function __construct(private Database $database)
    {
    }

    public function create(array $data): void
    {
        $sql = 'INSERT INTO Passenger (First_name, Last_name, Address, Phone_Number)
        VALUES (:first_name, :last_name, :address, :phone_number)';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':first_name', $data['First_name'], PDO::PARAM_STR);

        $stmt->bindValue(':last_name', $data['Last_name'], PDO::PARAM_STR);

        $stmt->bindValue(':address', $data['Address'], PDO::PARAM_STR);

        $stmt->bindValue(':phone_number', $data['Phone_Number'], PDO::PARAM_STR);

        $stmt->execute();

        $id = $pdo->lastInsertId();

        $sql = 'INSERT INTO user (ID, user_type, password_hash, api_key, api_key_hash)
        VALUES (:id, :user_type, :password_hash, :api_key, :api_key_hash)';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->bindValue(':user_type', 'passenger', PDO::PARAM_STR);

        $stmt->bindValue(':password_hash', $data['password_hash'], PDO::PARAM_STR);

        $stmt->bindValue(':api_key', $data['api_key'], PDO::PARAM_STR);

        $stmt->bindValue(':api_key_hash', $data['api_key_hash'], PDO::PARAM_STR);

        $stmt->execute();
    }
}