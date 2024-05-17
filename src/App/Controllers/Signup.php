<?php

declare(strict_types= 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Valitron\Validator;
use App\Repositories\UserRepository;

class Signup
{
    public function __construct(private PhpRenderer $view, private Validator $validator, private UserRepository $repository)
    {
        $this->validator->mapFieldsRules([
            'First_name' => ['required'],
            'Last_name' => ['required'],
            'Address' => ['required'],
            'Phone_Number' => ['required'],
            'password' => ['required', ['lengthMin', 6]],
            'password_confirmation' => ['required', ['equals', 'password']]
        ]);
    }

    public function new(Request $request, Response $response): Response
    {
        return $this->view->render($response,"signup.php");
    }

    public function create(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $this->validator = $this->validator->withData($data);

        if( ! $this->validator->validate()){
            
            return $this->view->render($response,"signup.php", ['errors' => $this->validator->errors(),
                                                                'data' => $data]);
        }

        $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $api_key = bin2hex(random_bytes(16));

        $data['api_key'] = $api_key;

        $data['api_key_hash'] = '';

        $this->repository->create($data);

        $response->getBody()->write("Here is your API key: $api_key");

        return $response;
    }
}