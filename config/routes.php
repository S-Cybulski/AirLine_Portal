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
use App\Controllers\TravelHistory;
use App\Middleware\GetPassengerById;
use App\Middleware\GetFlightById;
use App\Middleware\GetAircraftById;
use App\Middleware\GetStaffById;

$app->group('', function (RouteCollectorProxy $group) {

    $group->get('/', Home::class);
    
    $group->get('/signup', [Signup::class, 'new']);
    
    $group->post('/signup', [Signup::class, 'create']);
    
    $group->get('/login', [Login::class, 'new']);
    
    $group->post('/login', [Login::class, 'create']);

    $group->get('/logout', [Login::class,'destroy']);

    $group->get('/passenger/{id:[0-9]+}', Passenger::class);

    $group->post('/passenger/{id:[0-9]+}/book', Book::class);

    $group->get('/passenger/{id:[0-9]+}/flight-history', TravelHistory::class);

    $group->get('/staff/{emp-num:[0-9]+}', Staff::class)->add(GetStaffById::class);

    $group->get('/staff/{emp-num:[0-9]+}/manage-profile', Staff::class . ':viewUpdate')->add(GetStaffById::class);

    $group->post('/staff/{emp-num:[0-9]+}/manage-profile/update', Staff::class . ':updateRecord');

    $group->group('/admin/{id:[0-9]+}', function (RouteCollectorProxy $group) {

        $group->get('/assign-to-flight', Admin::class . ':viewAssign');

        $group->post('/assign-to-flight', Admin::class . ':assign');

        $group->group('/passengers', function (RouteCollectorProxy $group) {

            $group->get('', Admin::class . ':viewPassengers');

            $group->get('/view/{passengerId:[0-9]+}', Admin::class . ':viewPassengerRecord')->add(GetPassengerById::class);

            $group->get('/edit/{passengerId:[0-9]+}', Admin::class . ':viewEditPassengerRecord')->add(GetPassengerById::class);

            $group->post('/edit/{passengerId:[0-9]+}', Admin::class . ':editPassengerRecord');

            $group->post('/delete/{passengerId:[0-9]+}', Admin::class . ':deletePassengerRecord')->add(GetPassengerById::class);

        });

        $group->group('/flights', function (RouteCollectorProxy $group) {

            $group->get('', Admin::class . ':viewFlights');

            $group->get('/view/{flight-num:[0-9]+}', Admin::class . ':viewFlightRecord')->add(GetFlightById::class);

            $group->get('/edit/{flight-num:[0-9]+}', Admin::class . ':viewEditFlightRecord')->add(GetFlightById::class);

            $group->post('/edit/{flight-num:[0-9]+}', Admin::class . ':editFlightRecord');

            $group->post('/delete/{flight-num:[0-9]+}', Admin::class . ':deleteFlightRecord')->add(GetFlightById::class);

        });

        $group->group('/aircraft', function (RouteCollectorProxy $group) {

            $group->get('', Admin::class . ':viewAircraft');

            $group->get('/view/{serial-num:[0-9]+}', Admin::class . ':viewAircraftRecord')->add(GetAircraftById::class);

            $group->get('/edit/{serial-num:[0-9]+}', Admin::class . ':viewEditAircraftRecord')->add(GetAircraftById::class);

            $group->post('/edit/{serial-num:[0-9]+}', Admin::class . ':editAircraftRecord');

            $group->post('/delete/{serial-num:[0-9]+}', Admin::class . ':deleteAircraftRecord')->add(GetAircraftById::class);
        });

        $group->group('/staff', function (RouteCollectorProxy $group) {

            $group->get('', Admin::class . ':viewStaff');

            $group->get('/view/{emp-num:[0-9]+}', Admin::class . ':viewStaffRecord')->add(GetStaffById::class);

            $group->get('/edit/{emp-num:[0-9]+}', Admin::class . ':viewEditStaffRecord')->add(GetStaffById::class);

            $group->post('/edit/{emp-num:[0-9]+}', Admin::class . ':editStaffRecord');

            $group->post('/delete/{emp-num:[0-9]+}', Admin::class . ':deleteStaffRecord')->add(GetStaffById::class);
        });
    });
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