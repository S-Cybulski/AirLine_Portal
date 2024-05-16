<?php

declare(strict_types= 1);

use Slim\Factory\AppFactory;
use DI\ContainerBuilder;
use Slim\Handlers\Strategies\RequestResponseArgs;
use App\Middleware\AddJsonResponseHeader;

define('APP_ROOT', dirname(__DIR__));

require APP_ROOT."/vendor/autoload.php";

$builder = new ContainerBuilder;

$container = $builder->addDefinitions(APP_ROOT . '/config/definitions.php')->build();

AppFactory::setContainer($container);

$app = AppFactory::create();

$collector = $app->getRouteCollector();

$collector->setDefaultInvocationStrategy(new RequestResponseArgs);

$app->addBodyParsingMiddleware();

$error_middleware = $app->addErrorMiddleware(true, true, true);

$error_handler = $error_middleware->getDefaultErrorHandler();

$error_handler->forceContentType('application/json');

$app->add(new AddJsonResponseHeader);

$app->get("/api/passengers",  App\Controllers\PassengerIndex::class);
$app->get("/api",  App\Controllers\PassengerIndex::class);

$app->get("/api/passengers/{id:[0-9]+}", App\Controllers\Passengers::class . ':show')->add(App\Middleware\GetPassenger::class);

$app->post("/api/passengers", [App\Controllers\Passengers::class, 'create']);

$app->run();