CREATE DATABASE IF NOT EXISTS airline_db;
USE airline_db;

-- Table: Staff
CREATE TABLE Staff (
    EMP_Num INT PRIMARY KEY,
    Last_name VARCHAR(255),
    First_name VARCHAR(255),
    Address VARCHAR(255),
    Phone_number VARCHAR(20),
    Salary INT
);

-- Table: Pilot
CREATE TABLE Pilot (
    EMP_Num INT PRIMARY KEY,
    Type_rating VARCHAR(255),
    FOREIGN KEY (EMP_Num) REFERENCES Staff(EMP_Num)
);

-- Table: Aircraft
CREATE TABLE Aircraft (
    Serial_Num INT PRIMARY KEY,
    Manufacturer VARCHAR(255),
    Model VARCHAR(255)
);

-- Table: Flight
CREATE TABLE Flight (
    Flight_Num INT PRIMARY KEY,
    Origin VARCHAR(255),
    Destination VARCHAR(255),
    Date DATE,
    Arrival_time TIME,
    Intermediary_City VARCHAR(255),
    Departure_time TIME,
    Serial_Num INT,
    FOREIGN KEY (Serial_Num) REFERENCES Aircraft(Serial_Num)
);

-- Table: Passenger
CREATE TABLE Passenger (
    Passenger_ID INT AUTO_INCREMENT PRIMARY KEY,
    First_name VARCHAR(255),
    Last_name VARCHAR(255),
    Address VARCHAR(255),
    Phone_Number VARCHAR(20)
);

-- Table: Flight_Passenger
CREATE TABLE Flight_Passenger (
    Flight_Num INT,
    Passenger_ID INT,
    FOREIGN KEY (Flight_Num) REFERENCES Flight(Flight_Num),
    FOREIGN KEY (Passenger_ID) REFERENCES Passenger(Passenger_ID)
);

-- Table: Flight_crew
CREATE TABLE Flight_crew (
    Flight_Num INT,
    EMP_Num INT,
    FOREIGN KEY (Flight_Num) REFERENCES Flight(Flight_Num),
    FOREIGN KEY (EMP_Num) REFERENCES Staff(EMP_Num)
);

-- Table: Flight_City
CREATE TABLE Flight_City (
    Flight_Num INT,
    City VARCHAR(255),
    Intermediary_City VARCHAR(255),
    FOREIGN KEY (Flight_Num) REFERENCES Flight(Flight_Num)
);

INSERT INTO Aircraft (Serial_Num, Manufacturer, Model) VALUES
(1, 'Boeing', '737'),
(2, 'Airbus', 'A320'),
(3, 'Embraer', 'E175'),
(4, 'Bombardier', 'CRJ900'),
(5, 'Boeing', '787'),
(6, 'Airbus', 'A350');

-- Additional sample data for Staff table
INSERT INTO Staff (EMP_Num, Last_name, First_name, Address, Phone_number, Salary) VALUES
(106, 'Anderson', 'Michael', '123 Elm St, Anytown', '555-1111', 59000),
(107, 'Wilson', 'Sarah', '789 Maple St, Anycity', '555-3333', 61000),
(108, 'Taylor', 'Emily', '101 Pine St, Anothercity', '555-4444', 58000),
(109, 'Jackson', 'David', '202 Cedar St, Othertown', '555-5555', 60000),
(110, 'White', 'Jennifer', '303 Oak St, Somewhere', '555-6666', 62000),
(111, 'Harris', 'William', '404 Elm St, Anytown', '555-7777', 57000),
(112, 'Martin', 'Lisa', '505 Maple St, Anothercity', '555-8888', 59000),
(113, 'Thompson', 'Matthew', '606 Cedar St, Anycity', '555-9999', 60000),
(114, 'Garcia', 'Ashley', '707 Pine St, Othertown', '555-1234', 63000),
(115, 'Martinez', 'Christopher', '808 Oak St, Anytown', '555-5678', 64000);

-- Additional sample data for Pilot table
INSERT INTO Pilot (EMP_Num, Type_rating) VALUES
(106, 'Boeing 737'),
(107, 'Airbus A320'),
(108, 'Embraer E175'),
(109, 'Bombardier CRJ900'),
(110, 'Boeing 787'),
(111, 'Airbus A350');

-- Additional sample data for Passenger table
INSERT INTO Passenger (Passenger_ID, First_name, Last_name, Address, Phone_Number) VALUES
(1, 'John', 'Doe', '123 Main St, New York', '123-456-7890'),
(2, 'Jane', 'Smith', '456 Elm St, Los Angeles', '456-789-0123'),
(3, 'Michael', 'Johnson', '789 Oak St, Chicago', '789-012-3456'),
(4, 'Emily', 'Brown', '987 Pine St, Denver', '987-654-3210'),
(5, 'David', 'Wilson', '654 Maple St, Dallas', '654-321-0987'),
(6, 'Sarah', 'Martinez', '321 Cedar St, Miami', '321-098-7654'),
(7, 'James', 'Anderson', '456 Birch St, Atlanta', '456-789-0123'),
(8, 'Jessica', 'Taylor', '789 Walnut St, Houston', '789-012-3456'),
(9, 'Daniel', 'Thomas', '123 Cherry St, Seattle', '123-456-7890'),
(10, 'Olivia', 'Clark', '987 Pine St, San Francisco', '987-654-3210'),
(11, 'Emma', 'Lewis', '654 Elm St, Boston', '654-321-0987'),
(12, 'Noah', 'Moore', '321 Oak St, Philadelphia', '321-098-7654'),
(13, 'William', 'Jackson', '456 Maple St, Washington', '456-789-0123'),
(14, 'Ava', 'White', '789 Cedar St, Chicago', '789-012-3456'),
(15, 'Sophia', 'Harris', '123 Birch St, Los Angeles', '123-456-7890'),
(16, 'Alexander', 'Martin', '654 Walnut St, New York', '654-321-0987'),
(17, 'Mia', 'Thompson', '321 Cherry St, Miami', '321-098-7654'),
(18, 'Ethan', 'Garcia', '987 Elm St, Seattle', '987-654-3210'),
(19, 'Isabella', 'Rodriguez', '456 Oak St, San Francisco', '456-789-0123'),
(20, 'Charlotte', 'Lopez', '123 Maple St, Boston', '123-456-7890'),
(21, 'Aiden', 'Perez', '321 Pine St, Philadelphia', '321-098-7654'),
(22, 'Amelia', 'Williams', '789 Cedar St, Washington', '789-012-3456'),
(23, 'Lucas', 'Rivera', '456 Birch St, Chicago', '456-789-0123'),
(24, 'Liam', 'Long', '654 Walnut St, Los Angeles', '654-321-0987'),
(25, 'Harper', 'Young', '123 Cedar St, New York', '123-456-7890');

-- Additional sample data for Flight table
INSERT INTO Flight (Flight_Num, Origin, Destination, Date, Arrival_time, Intermediary_City, Departure_time, Serial_Num) VALUES
(1001, 'New York', 'Los Angeles', '2024-05-01', '08:00:00', NULL, '10:30:00', 1),
(1002, 'Los Angeles', 'Chicago', '2024-05-01', '12:00:00', 'Denver', '15:30:00', 2),
(1003, 'Chicago', 'Denver', '2024-05-02', '10:00:00', 'Dallas', '12:30:00', 3),
(1004, 'Denver', 'Dallas', '2024-05-02', '14:00:00', 'Miami', '16:30:00', 4),
(1005, 'Dallas', 'Miami', '2024-05-03', '08:00:00', 'Atlanta', '10:30:00', 5),
(1006, 'Miami', 'Atlanta', '2024-05-03', '12:00:00', 'Houston', '14:30:00', 6),
(1007, 'Atlanta', 'Houston', '2024-05-04', '10:00:00', NULL, '12:30:00', 1),
(1008, 'Houston', 'New York', '2024-05-04', '14:00:00', NULL, '16:30:00', 2);

-- Additional sample data for Flight_City table
INSERT INTO Flight_City (Flight_Num, City, Intermediary_City) VALUES
(1001, 'New York', NULL),
(1002, 'Los Angeles', 'Chicago'),
(1003, 'Chicago', 'Denver'),
(1004, 'Denver', 'Dallas'),
(1005, 'Dallas', 'Miami'),
(1006, 'Miami', 'Atlanta'),
(1007, 'Atlanta', 'Houston'),
(1008, 'Houston', NULL);

-- Additional sample data for Flight_crew table
INSERT INTO Flight_crew (Flight_Num, EMP_Num) VALUES
(1001, 106),
(1001, 107),
(1002, 108),
(1002, 109),
(1003, 110),
(1003, 111),
(1004, 112),
(1004, 113),
(1005, 114),
(1005, 115),
(1006, 106),
(1006, 107),
(1007, 108),
(1007, 109),
(1008, 110),
(1008, 111);


-- Additional sample data for Flight_Passenger table
INSERT INTO Flight_Passenger (Flight_Num, Passenger_ID) VALUES
(1001, 3),
(1001, 4),
(1001, 5),
(1002, 6),
(1002, 7),
(1003, 8),
(1003, 9),
(1004, 10),
(1004, 11),
(1005, 12),
(1005, 13),
(1006, 14),
(1006, 15),
(1007, 16),
(1007, 17),
(1008, 18),
(1008, 19);
