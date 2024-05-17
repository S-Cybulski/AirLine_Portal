<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Repositories\AirlineRepository;

class TravelHistory
{
    public function __construct(private PhpRenderer $view, private AirlineRepository $repository)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $this->repository->getBookedFlights($_SESSION['user_id']);

        return $this->view->render($response,"travelHistory.php", ['data' => $data]);
    }
}