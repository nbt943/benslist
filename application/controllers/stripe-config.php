<?php

// Initialize composer
require_once __DIR__ .'/vendor/autoload.php';

// Composer autoloads Stripe library when first referenced.

// Set Stripe API key


// TODO: set these to your secret and publishable keys


function config($key) {

$Config = [
    'secret_key' => 'sk_test_aj9NTWPUqSzgiCvAe5krhLZ5',
    'publishable_key' => 'pk_test_4mD2KwQUhc29eEUGxGv0Hd3C',
];
    if (!isset($Config[$key])) die("Unknown configuration item '$key'");
    return $Config[$key];
}

\Stripe\Stripe::setApiKey(config('secret_key'));


