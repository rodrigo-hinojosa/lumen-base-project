<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
    'supportsCredentials' => true,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['Content-Type', 'Authorization'],
    'allowedMethods' => ['OPTIONS', 'GET', 'POST', 'PUT', 'DELETE'],
    'exposedHeaders' => ['Authorization'],
    'maxAge' => 0,
    'hosts' => [],
];