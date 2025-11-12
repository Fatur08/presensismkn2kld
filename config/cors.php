<?php

/*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
/*
return [



    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:9000'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
*/

return [
    'paths' => ['api/*', 'get-image/*', 'storage/*'],
    //'paths' => ['api/', 'sanctum/csrf-cookie', 'storage/app/public/uploads/murid/*'],
    // 'paths' => ['api/*', 'storage/uploads/murid/*'], // Tambahkan path yang ingin diizinkan
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'], // Bisa diganti dengan ['http://localhost:9000'] untuk lebih aman
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];

