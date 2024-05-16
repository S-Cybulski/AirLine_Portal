<?php

declare(strict_types= 1);

use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require dirname(__DIR__) ."/vendor/autoload.php";

$app = AppFactory::create();

$app->get("/", function (Request $request, Response $response) {

    $dsn = "mysql:host=db;dbname=airline_db;charset=utf8";

    $pdo = new PDO($dsn,"root","password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $stmt = $pdo->query('SELECT * FROM Passenger');

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $body = json_encode($data);

    $response->getBody()->write($body);

    return $response->withHeader('Content-Type','application/json');
});

$app->run();