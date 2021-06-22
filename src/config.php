<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Webhook URL, HTTP header, and Secret Token
    |--------------------------------------------------------------------------
    |
    | Here you may specify webhook url of third-party applications
    | you wish to send notifications.
    | Use this token to validate received payloads. It is sent with
    | the request in the HTTP header.
    |
    */

    'webhook_url' => env('WEBHOOK_URL', ''),

    'http_header' => env('WEBHOOK_HTTP_HEADER', ''),
    
    'secret_token' => env('WEBHOOK_TOKEN_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Commands
    |--------------------------------------------------------------------------
    |
    | Here are each of the commands setup for your application that
    | you wish to execute in response to events configured from project
    | repositories webhook.
    |
    */

    'commands' => [
        'git-pull' => '/usr/bin/git pull',
        'migrate' => '/usr/bin/php artisan migrate',
        'seed' => '/usr/bin/php artisan seed',
        'composer-install' => '/usr/local/bin/composer install',
        'composer-dump' => '/usr/local/bin/composer dump-autoload -o',
        'npm-install' => '/usr/bin/npm install',
        'npm-compile' => '/usr/bin/npm run production'
    ]
];
