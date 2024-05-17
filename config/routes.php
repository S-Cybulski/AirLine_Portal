<?php

declare(strict_types= 1);

use App\Controllers\PassengerIndex;
use App\Controllers\Passengers;
use App\Middleware\GetPassenger;
use Slim\Routing\RouteCollectorProxy;
use App\Controllers\Home;
use App\Middleware\AddJsonResponseHeader;
use App\Middleware\RequireAPIKey;
use App\Controllers\Signup;
use App\Controllers\Login;
use App\Middleware\ActivateSession;
use App\Controllers\Passenger;
use App\Controllers\Staff;
use App\Controllers\Admin;
use App\Controllers\Book;

$app->group('', function (RouteCollectorProxy $group) {

    $group->get('/', Home::class);
    
    $group->get('/signup', [Signup::class, 'new']);
    
    $group->post('/signup', [Signup::class, 'create']);
    
    $group->get('/login', [Login::class, 'new']);
    
    $group->post('/login', [Login::class, 'create']);

    $group->get('/logout', [Login::class,'destroy']);

    $group->get('/passenger/{id:[0-9]+}', Passenger::class);

    $group->post('/passenger/{id:[0-9]+}/book', Book::class);

    $group->get('/staff/{id:[0-9]+}', Staff::class);

    $group->get('/admin/{id:[0-9]+}', Admin::class);

})->add(ActivateSession::class);


$app->group('/api', function(RouteCollectorProxy $group){

    $group->get("/passengers",  PassengerIndex::class);
    
    $group->post("/passengers", [Passengers::class, 'create']);

    $group->group('', function(RouteCollectorProxy $group){

        $group->get("/passengers/{id:[0-9]+}", Passengers::class . ':show');
    
        $group->patch("/passengers/{id:[0-9]+}", Passengers::class . ':update');
    
        $group->delete("/passengers/{id:[0-9]+}", Passengers::class . ':delete');
    })->add(GetPassenger::class);
})->add(new AddJsonResponseHeader)->add(RequireAPIKey::class);