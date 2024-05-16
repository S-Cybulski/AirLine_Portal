<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Repositories\AirlineRepository;

class Passengers
{
    public function __construct(private AirlineRepository $repository)
    {
    }

    public function show(Request $request, Response $response,string $id): Response
    {
        $passenger = $request->getAttribute('passenger');

        $body = json_encode($passenger);
    
        $response->getBody()->write($body);
    
        return $response;
    }

    public function create(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        $body = json_encode($body);

        $response->getBody()->write($body);

        return $response;
    }
}