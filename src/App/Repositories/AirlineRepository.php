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

    public function getAircraftById(int $id): array|bool
    {
        $sql = 'SELECT * FROM Aircraft WHERE Serial_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getFlightById(int $id): array|bool
    {
        $sql = 'SELECT * FROM Flight WHERE Flight_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStaffById(int $id): array|bool
    {
        $sql = 'SELECT s.*, p.Type_rating 
        FROM Staff s 
        LEFT JOIN Pilot p ON s.EMP_Num = p.EMP_Num 
        WHERE s.EMP_Num = :id';

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

    public function updateFlight(int $id, array $data) : int
    {
        $sql = 'UPDATE Flight
                SET Origin=:origin, 
                    Destination=:destination, 
                    Date=:date,
                    Arrival_time=:arrival_time,
                    Intermediary_City=:intermediary_city,
                    Departure_time=:departure_time,
                    Serial_Num=:serial_num
                WHERE Flight_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':origin', $data['Origin'], PDO::PARAM_STR);

        $stmt->bindValue(':destination', $data['Destination'], PDO::PARAM_STR);

        $stmt->bindValue(':date', $data['Date'], PDO::PARAM_STR);

        $stmt->bindValue(':arrival_time', $data['Arrival_time'], PDO::PARAM_STR);

        $stmt->bindValue(':intermediary_city', $data['Intermediary_City'], PDO::PARAM_STR);

        $stmt->bindValue(':departure_time', $data['Departure_time'], PDO::PARAM_STR);

        $stmt->bindValue(':serial_num', $data['Serial_Num'], PDO::PARAM_STR);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function updateStaff(int $id, array $data) : int
    {
        $sql = 'UPDATE Staff
                SET Last_name=:Last_name, 
                    First_name=:First_name, 
                    Address=:Address,
                    Phone_number=:Phone_number,
                    Salary=:Salary,
                    Departure_time=:departure_time,
                    Serial_Num=:serial_num
                WHERE Flight_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':Last_name', $data['Last_name'], PDO::PARAM_STR);

        $stmt->bindValue(':First_name', $data['First_name'], PDO::PARAM_STR);

        $stmt->bindValue(':Address', $data['Address'], PDO::PARAM_STR);

        $stmt->bindValue(':Phone_number', $data['Phone_number'], PDO::PARAM_STR);

        $stmt->bindValue(':Salary', $data['Salary'], PDO::PARAM_INT);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function updateAircraft(int $id, array $data) : int
    {
        $sql = 'UPDATE Aircraft
                SET Manufacturer=:Manufacturer, 
                    Model=:Model
                WHERE Serial_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':Manufacturer', $data['Manufacturer'], PDO::PARAM_STR);

        $stmt->bindValue(':Model', $data['Model'], PDO::PARAM_STR);

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

    public function deleteFlight(string $id) : int
    {
        $sql = 'DELETE FROM Flight WHERE Flight_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function deleteAircraft(string $id) : int
    {
        $sql = 'DELETE FROM Aircraft WHERE Serial_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function deleteStaff(string $id) : int
    {
        $sql = 'DELETE FROM Staff WHERE EMP_Num = :id';

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

    public function getBookedFlights(int $id) : array
    {
        $sql = 'SELECT Flight_NUM FROM Flight_Passenger WHERE Passenger_ID=:id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = 'SELECT f.* 
        FROM Flight f
        INNER JOIN Flight_Passenger fp ON f.Flight_Num = fp.Flight_Num
        WHERE fp.Passenger_ID = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getAllStaff() : array
    {
        $sql = 'SELECT s.*, p.Type_rating 
        FROM Staff s 
        LEFT JOIN Pilot p ON s.EMP_Num = p.EMP_Num';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAircraft() : array
    {
        $sql = 'SELECT * FROM Aircraft';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTypeRating(int $id)
    {
        $sql = 'SELECT Type_rating FROM Pilot WHERE EMP_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAssignedFlights(int $id) : array
    {
        $sql = 'SELECT Flight_NUM FROM Flight_crew WHERE EMP_Num=:id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = 'SELECT f.* 
        FROM Flight f
        INNER JOIN Flight_crew fc ON f.Flight_Num = fc.Flight_Num
        WHERE fc.EMP_Num = :id';

        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

}