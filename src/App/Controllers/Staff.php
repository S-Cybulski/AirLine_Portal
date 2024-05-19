<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Repositories\AirlineRepository;
class Staff
{
    public function __construct(private PhpRenderer $view, private AirlineRepository $repository)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $staff = $request->getAttribute('staff');

        $data = $this->repository->getAssignedFlights($staff['EMP_Num']);

        return $this->view->render($response,"staff.php", ['data' => $data]);
    }
}