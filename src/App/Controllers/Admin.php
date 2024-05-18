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
        $this->validator->mapFieldsRules([
            'First_name' => ['required'],
            'Last_name' => ['required'],
            'Address' => ['required'],
            'Phone_Number' => ['required']
        ]);
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

}