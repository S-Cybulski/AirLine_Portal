<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Repositories\AirlineRepository;

class Book
{
    public function __construct(private PhpRenderer $view, private AirlineRepository $repository)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();
    
        $data = $this->repository->bookFlight((int) $body['ID'], (int) $body['Flight_Num']);
    
        return $this->view->render($response, "book.php", ['data' => $data]);
    }
}