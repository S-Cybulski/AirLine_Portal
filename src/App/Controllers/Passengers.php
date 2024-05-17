<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Repositories\AirlineRepository;
use Valitron\Validator;

class Passengers
{
    public function __construct(private AirlineRepository $repository, private Validator $validator)
    {
        $this->validator->mapFieldsRules([
            'First_name' => ['required'],
            'Last_name' => ['required'],
            'Address' => ['required'],
            'Phone_Number' => ['required']
        ]);
    }

    public function show(Request $request, Response $response,string $id): Response
    {
        $passenger = $request->getAttribute('passenger');

        $body = json_encode($passenger);
    
        $response->getBody()->write($body);
    
        return $response;
    }

    public function create(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        $this->validator = $this->validator->withData($body);

        if ( ! $this->validator->validate()) {
            $response->getBody()->write(json_encode($this->validator->errors()));

            return $response->withStatus(422);
        }

        $id = $this->repository->createPassenger($body);

        $body = json_encode([
            'message' => 'Passenger record created',
            'id'=> $id
        ]);

        $response->getBody()->write($body);

        return $response->withStatus(201);
    }

    public function update(Request $request, Response $response, string $id): Response
    {
        $body = $request->getParsedBody();

        $this->validator = $this->validator->withData($body);

        if ( ! $this->validator->validate()) {
            $response->getBody()->write(json_encode($this->validator->errors()));

            return $response->withStatus(422);
        }

        $rows = $this->repository->updatePassenger((int) $id, $body);

        $body = json_encode([
            'message' => 'Passenger record updated',
            'rows'=> $rows
        ]);

        $response->getBody()->write($body);

        return $response->withStatus(200);
    }

    public function delete(Request $request, Response $response, string $id): Response
    {
        $rows = $this->repository->deletePassenger($id);

        $body = json_encode([
            'message' => 'Passenger record deleted',
            'rows' => $rows
        ]);

        $response->getBody()->write($body);

        return $response;
    }
}