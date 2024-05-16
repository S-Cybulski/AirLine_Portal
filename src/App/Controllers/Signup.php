<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class Signup
{
    public function __construct(private PhpRenderer $view)
    {
    }

    public function new(Request $request, Response $response): Response
    {
        return $this->view->render($response,"signup.php");
    }

    public function create(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        print_r($data);

        return $response;
    }
}