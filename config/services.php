<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'twitter' => [
    'client_id' => '4c5Xfre3nH28sM04og9ACmM3r',
    'client_secret' => 'RSr62KAPorZDaJikwJs8pnJ0pr5BpplDTpugBBTjEufD53JFzi',
    'redirect' => 'http://localhost:8000/login-twitter/callback',
    ],

    'facebook' => [
    'client_id' => '161822934295460',
    'client_secret' => 'c494a888b39511c2aa05d7a672971f29',
    'redirect' => 'http://localhost:8000/login-facebook/callback',
    ],

    'google' => [
    'client_id' => 'your-github-app-id',
    'client_secret' => 'your-github-app-secret',
    'redirect' => 'http://your-callback-url',
    ],
];
