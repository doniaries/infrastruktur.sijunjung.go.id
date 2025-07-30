<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Login Rate Limiting Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration controls the rate limiting for login attempts.
    | You can adjust the maximum attempts and decay time as needed.
    |
    */

    'login' => [
        'max_attempts' => env('LOGIN_MAX_ATTEMPTS', 5),
        'decay_minutes' => env('LOGIN_DECAY_MINUTES', 1),
        'lockout_duration' => env('LOGIN_LOCKOUT_DURATION', 60), // seconds
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Rate Limiting Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration controls the global rate limiting for all requests.
    |
    */

    'global' => [
        'max_attempts' => env('GLOBAL_MAX_ATTEMPTS', 1000),
        'decay_minutes' => env('GLOBAL_DECAY_MINUTES', 1),
    ],

    /*
    |--------------------------------------------------------------------------
    | API Rate Limiting Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration controls the rate limiting for API requests.
    |
    */

    'api' => [
        'max_attempts' => env('API_MAX_ATTEMPTS', 60),
        'decay_minutes' => env('API_DECAY_MINUTES', 1),
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting Messages
    |--------------------------------------------------------------------------
    |
    | Customize the messages shown when rate limits are exceeded.
    |
    */

    'messages' => [
        'login_throttled' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam :seconds detik.',
        'api_throttled' => 'Terlalu banyak permintaan API. Silakan coba lagi dalam :seconds detik.',
        'global_throttled' => 'Terlalu banyak permintaan. Silakan coba lagi dalam :seconds detik.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting Cache Store
    |--------------------------------------------------------------------------
    |
    | Specify which cache store should be used for rate limiting.
    | This should correspond to one of your configured cache stores.
    |
    */

    'cache_store' => env('RATE_LIMIT_CACHE_STORE', 'default'),

];