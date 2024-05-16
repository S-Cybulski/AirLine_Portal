<?php 

use App\Database;
use Slim\Views\PhpRenderer;

return [
    Database::class => function() {
        
        return new Database(host: 'db',
                            name: 'airline_db',
                            user: 'root',
                            password: 'password');
    },

    PhpRenderer::class => function() {

        $renderer = new PhpRenderer(__DIR__ . '/../views');

        $renderer->setLayout('layout.php');

        return $renderer;
    }
];