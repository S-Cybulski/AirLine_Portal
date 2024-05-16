<?php

declare(strict_types= 1);

use Slim\Factory\AppFactory;
use DI\ContainerBuilder;
use Slim\Handlers\Strategies\RequestResponseArgs;
use App\Middleware\AddJsonResponseHeader;
use App\Controllers\PassengerIndex;
use App\Controllers\Passengers;
use App\Middleware\GetPassenger;
use Slim\Routing\RouteCollectorProxy;

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

$app->group('/api', function(RouteCollectorProxy $group){

    $group->get("/passengers",  PassengerIndex::class);
    
    $group->post("/passengers", [Passengers::class, 'create']);

    $group->group('', function(RouteCollectorProxy $group){

        $group->get("/passengers/{id:[0-9]+}", Passengers::class . ':show');
    
        $group->patch("/passengers/{id:[0-9]+}", Passengers::class . ':update');
    
        $group->delete("/passengers/{id:[0-9]+}", Passengers::class . ':delete');
    })->add(GetPassenger::class);;
});

$app->run();