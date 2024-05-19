<?php

declare(strict_types= 1);

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Routing\RouteContext;
use App\Repositories\AirlineRepository;
use Slim\Exception\HttpNotFoundException;

class GetAircraftById
{
    public function __construct(private AirlineRepository $repository)
    {

    }
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $context = RouteContext::fromRequest($request);

        $route = $context->getRoute();

        $id = $route->getArgument("serial-num");

        $data = $this->repository->getAircraftById((int) $id);
    
        if($data === false)
        {
            throw new HttpNotFoundException($request, message: 'Passenger not found');
        }

        $request = $request->withAttribute('aircraft', $data);

        return $handler->handle($request);
    }
}