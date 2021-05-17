<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'github' => [
        'client_id' => 'Iv1.8748145b2840a04a',
        'client_secret' => '63e2a6fc787022c2ec6704a9333c52b610ee9d7f',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],
    'facebook' => [
        'client_id' => '183276290227243',
        'client_secret' => 'abcda6086eb28e7a6dd5c8d6ae9bf59a',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
