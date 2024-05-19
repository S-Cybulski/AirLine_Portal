<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Repositories\AirlineRepository;
use Valitron\Validator;

class Admin
{
    public function __construct(private PhpRenderer $view, private AirlineRepository $repository, private Validator $validator)
    {
    }

    public function viewPassengers(Request $request, Response $response): Response
    {
        $data = $this->repository->getAllPassengers();

        return $this->view->render($response,"adminPassenger.php", ['data' => $data]);
    }

    public function viewStaff(Request $request, Response $response): Response
    {
        $data = $this->repository->getAllStaff();

        return $this->view->render($response,"adminStaff.php", ['data' => $data]);
    }

    public function viewAircraft(Request $request, Response $response): Response
    {
        $data = $this->repository->getAllAircraft();

        return $this->view->render($response,"adminAircraft.php", ['data' => $data]);
    }

    public function viewFlights(Request $request, Response $response): Response
    {
        $data = $this->repository->getFlightData();

        return $this->view->render($response,"adminFlights.php", ['data' => $data]);
    }

    public function viewPassengerRecord(Request $request, Response $response): Response
    {
        $passenger = $request->getAttribute('passenger');

        return $this->view->render($response,"adminPassengerView.php", ['data' => $passenger]);
    }

    public function viewEditPassengerRecord(Request $request, Response $response): Response
    {
        $passenger = $request->getAttribute('passenger');

        return $this->view->render($response,"adminPassengerEdit.php", ['data' => $passenger]);
    }

    public function editPassengerRecord(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        $this->validator->mapFieldsRules([
            'First_name' => ['required'],
            'Last_name' => ['required'],
            'Address' => ['required'],
            'Phone_Number' => ['required']
        ]);

        $this->validator = $this->validator->withData($body);

        if ( ! $this->validator->validate()) {
            $errors = $this->validator->errors();

            return $this->view->render($response, 'adminPassengerEdit.php', ['data' => $body, 'errors' => $errors]);
        }

        $this->repository->updatePassenger((int) $body['Passenger_ID'], $body);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/passengers/view/{$body['Passenger_ID']}")->withStatus(302);

    }

    public function deletePassengerRecord(Request $request, Response $response): Response
    {
        $passenger = $request->getAttribute("passenger");

        $this->repository->deletePassenger((string) $passenger['Passenger_ID']);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/passengers")->withStatus(302);
    }

    public function viewFlightRecord(Request $request, Response $response): Response
    {
        $flight = $request->getAttribute('flight');

        return $this->view->render($response,"adminFlightView.php", ['data' => $flight]);
    }


    public function viewEditFlightRecord(Request $request, Response $response): Response
    {
        $flight = $request->getAttribute('flight');

        return $this->view->render($response,"adminFlightEdit.php", ['data' => $flight]);
    }

    public function editFlightRecord(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        $this->validator->mapFieldsRules([
            'Origin' => ['required'],
            'Destination' => ['required'],
            'Date' => ['required'],
            'Arrival_time' => ['required'],
            'Departure_time' => ['required']
        ]);

        $this->validator = $this->validator->withData($body);

        if ( ! $this->validator->validate()) {
            $errors = $this->validator->errors();

            return $this->view->render($response, 'adminFlightEdit.php', ['data' => $body, 'errors' => $errors]);
        }

        $this->repository->updateFlight((int) $body['Flight_Num'], $body);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/flights/view/{$body['Flight_Num']}")->withStatus(302);

    }

    public function deleteFlightRecord(Request $request, Response $response): Response
    {
        $flight = $request->getAttribute("flight");

        $this->repository->deleteFlight((string) $flight['Flight_Num']);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/flights")->withStatus(302);
    }

    public function viewAircraftRecord(Request $request, Response $response): Response
    {
        $aircraft = $request->getAttribute('aircraft');

        return $this->view->render($response,"adminAircraftView.php", ['data' => $aircraft]);
    }


    public function viewEditAircraftRecord(Request $request, Response $response): Response
    {
        $aircraft = $request->getAttribute('aircraft');

        return $this->view->render($response,"adminAircraftEdit.php", ['data' => $aircraft]);
    }

    public function editAircraftRecord(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        $this->validator->mapFieldsRules([
            'Manufacturer' => ['required'],
            'Model' => ['required'],
        ]);

        $this->validator = $this->validator->withData($body);

        if ( ! $this->validator->validate()) {
            $errors = $this->validator->errors();

            return $this->view->render($response, 'adminAircraftEdit.php', ['data' => $body, 'errors' => $errors]);
        }

        $this->repository->updateAircraft((int) $body['Serial_Num'], $body);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/aircraft/view/{$body['Serial_Num']}")->withStatus(302);

    }

    public function deleteAircraftRecord(Request $request, Response $response): Response
    {
        $aircraft = $request->getAttribute("aircraft");

        $this->repository->deleteAircraft((string) $aircraft['Serial_Num']);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/aircraft")->withStatus(302);
    }

    public function viewStaffRecord(Request $request, Response $response): Response
    {
        $staff = $request->getAttribute('staff');

        return $this->view->render($response,"adminStaffView.php", ['data' => $staff]);
    }


    public function viewEditStaffRecord(Request $request, Response $response): Response
    {
        $staff = $request->getAttribute('staff');

        return $this->view->render($response,"adminStaffEdit.php", ['data' => $staff]);
    }

    public function editStaffRecord(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        $this->validator->mapFieldsRules([
            'Last_name' => ['required'],
            'First_name' => ['required'],
            'Address' => ['required'],
            'Phone_number' => ['required'],
            'Salary' => ['required','numeric']
        ]);

        $this->validator = $this->validator->withData($body);

        if ( ! $this->validator->validate()) {
            $errors = $this->validator->errors();

            return $this->view->render($response, 'adminStaffEdit.php', ['data' => $body, 'errors' => $errors]);
        }

        $this->repository->updateStaff((int) $body['EMP_Num'], $body);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/staff/view/{$body['EMP_Num']}")->withStatus(302);

    }

    public function deleteStaffRecord(Request $request, Response $response): Response
    {
        $aircraft = $request->getAttribute("aircraft");

        $this->repository->deleteStaff((string) $aircraft['Serial_Num']);

        return $response->withHeader('Location', "/admin/{$_SESSION['user_id']}/staff")->withStatus(302);
    }

}