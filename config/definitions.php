<?php 

use App\Database;

return [
    Database::class => function() {
        
        return new Database(host: 'db',
                            name: 'airline_db',
                            user: 'root',
                            password: 'password');
    }
];