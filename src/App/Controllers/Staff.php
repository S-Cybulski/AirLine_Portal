<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Repositories\AirlineRepository;
use Valitron\Validator;
class Staff
{
    public function __construct(private PhpRenderer $view, private AirlineRepository $repository, private Validator $validator)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $staff = $request->getAttribute('staff');

        $data = $this->repository->getAssignedFlights($staff['EMP_Num']);

        return $this->view->render($response,"staff.php", ['data' => $data, 'staff' => $staff]);
    }

    public function viewUpdate(Request $request, Response $response): Response
    {
        $staff = $request->getAttribute('staff');

        return $this->view->render($response,"staffUpdate.php", ['data' => $staff]);
    }

    public function updateRecord(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        $this->validator->mapFieldsRules([
            'Last_name' => ['required'],
            'First_name' => ['required'],
            'Address' => ['required'],
            'Phone_number' => ['required'],
        ]);

        $this->validator = $this->validator->withData($body);

        if ( ! $this->validator->validate()) {
            $errors = $this->validator->errors();

            return $this->view->render($response, 'staffUpdate.php', ['data' => $body, 'errors' => $errors]);
        }

        $this->repository->updateStaff((int) $body['EMP_Num'], $body);

        return $response->withHeader('Location', "/staff/{$body['EMP_Num']}")->withStatus(302);

    }
}