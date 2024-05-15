<?php

declare(strict_types= 1);

use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require dirname(__DIR__) ."/vendor/autoload.php";

$app = AppFactory::create();

$app->get("/", function (Request $request, Response $response) {

    return $response->getBody()->write(file_get_contents('index.html'));

});

$app->run();