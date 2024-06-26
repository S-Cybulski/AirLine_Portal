<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Repositories\AirlineRepository;

class PassengerIndex
{
    public function __construct(private AirlineRepository $repository)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $this->repository->getAllPassengers();
    
        $body = json_encode($data);
    
        $response->getBody()->write($body);
    
        return $response;
    }
}