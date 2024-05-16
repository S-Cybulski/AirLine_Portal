<?php

declare(strict_types= 1);

use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use DI\ContainerBuilder;

define('APP_ROOT', dirname(__DIR__));

require APP_ROOT."/vendor/autoload.php";

$builder = new ContainerBuilder;

$container = $builder->addDefinitions(APP_ROOT . '/config/definitions.php')->build();

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->get("/", function (Request $request, Response $response) {

    $repository = $this->get(App\Repositories\AirlineRepository::class);

    $data = $repository->getAllPassengers();

    $body = json_encode($data);

    $response->getBody()->write($body);

    return $response->withHeader('Content-Type','application/json');
});

$app->run();