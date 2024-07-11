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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],


    'openweather' => [
        'api_uri' => env('OPEN_WEATHER_API_URI'),
        'default_type' => env('OPEN_WEATHER_API_DEFAULT_TYPE'),
        'api_key' => env('OPEN_WEATHER_API_KEY'),
        'limit' => env('OPEN_WEATHER_LIMIT'),
        'units' => env('OPEN_WEATHER_UNITS'),
    ],

    'geoapify' => [
        'api_uri' => env('GEOAPIFY_API_URI'),
        'api_key' => env('GEOAPIFY_API_KEY'),
        'filter' => env('GEOAPIFY_FILTER'),
        'format' => env('GEOAPIFY_FORMAT'),
        'lang' => env('GEOAPIFY_LANG'),
        'limit' => env('GEOAPIFY_LIMIT'),
        'type' => env('GEOAPIFY_TYPE'),
    ],

    'foursquare' => [
        'api_uri' => env('FOURSQUARE_API_URI'),
        'api_token' => env('FOURSQUARE_API_TOKEN'),
        'api_limit' => env('FOURSQUARE_API_LIMIT'),
    ],
];
