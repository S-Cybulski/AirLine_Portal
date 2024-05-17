<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Repositories\AirlineRepository;

class Passenger
{
    public function __construct(private PhpRenderer $view, private AirlineRepository $repository)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $this->repository->getFlightData();

        return $this->view->render($response,"passenger.php", ['data' => $data]);
    }
}