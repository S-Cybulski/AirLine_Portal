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

    public function getPassengerById(int $id): array|bool
    {
        $sql = 'SELECT * FROM Passenger WHERE passenger_id = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPassenger(array $data) : string
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

        return $pdo->lastInsertId();
    }

    public function updatePassenger(int $id, array $data) : int
    {
        $sql = 'UPDATE Passenger 
                SET First_name=:first_name, 
                    Last_name=:last_name, 
                    Address=:address, 
                    Phone_Number=:phone_number 
                WHERE Passenger_ID = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':first_name', $data['First_name'], PDO::PARAM_STR);

        $stmt->bindValue(':last_name', $data['Last_name'], PDO::PARAM_STR);

        $stmt->bindValue(':address', $data['Address'], PDO::PARAM_STR);

        $stmt->bindValue(':phone_number', $data['Phone_Number'], PDO::PARAM_STR);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function deletePassenger(string $id) : int
    {
        $sql = 'DELETE FROM Passenger WHERE Passenger_ID = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getFlightData() : array
    {
        $sql = 'SELECT * FROM Flight';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bookFlight(int $id, int $flight_num)
    {
        $sql = 'INSERT INTO Flight_Passenger (Flight_Num, Passenger_ID)
                VALUES (:Flight_Num, :Passenger_ID)';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':Flight_Num', $flight_num, PDO::PARAM_INT);

        $stmt->bindValue(':Passenger_ID', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $flight_num;
    }
}