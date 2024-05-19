# AirLine_Portal

## Introduction
AirLine_Portal is a prototype web application for managing airline operations built using docker and slim framework.

## Requirements
To run the AirLine_Portal application, ensure that you have Docker and Docker Compose installed on your system. The Docker Desktop application should be sufficient for most users.

## Setup Instructions
Follow these steps to set up and run the AirLine_Portal application:

1. **Start Docker**: Ensure that Docker is running on your system.

2. **Run Docker Compose**: Open a terminal and run the following command:
    ```
    docker-compose build && docker-compose up -d
    ```

3. **Access the Application**: Open a web browser and navigate to `localhost:80/login` to access the AirLine_Portal.

## User Accounts
The AirLine_Portal provides three different user accounts, each with its own interface:

### Admin Account
- **ID:** 100000
- **Password:** admin_password

### Passenger Account
- **ID:** 1
- **Password:** passenger1

### Staff Account
- **ID:** 106
- **Password:** staff106

Feel free to explore the application using these accounts and experience their respective interfaces.

## Note
This version of AirLine_Portal is a prototype build intended for demonstration and testing purposes.
