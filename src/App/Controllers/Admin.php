<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Repositories\AirlineRepository;

class Admin
{
    public function __construct(private PhpRenderer $view, private AirlineRepository $repository)
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

        return $this->view->render($response,"adminPassenger.php", ['data' => $data]);
    }

    public function viewAircraft(Request $request, Response $response): Response
    {
        $data = $this->repository->getAllAircraft();

        return $this->view->render($response,"adminPassenger.php", ['data' => $data]);
    }

    public function viewFlights(Request $request, Response $response): Response
    {
        $data = $this->repository->getFlightData();

        return $this->view->render($response,"adminPassenger.php", ['data' => $data]);
    }
}