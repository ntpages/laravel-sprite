<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Files
    |--------------------------------------------------------------------------
    |
    | Using the laravel default convention.
    |
    */

    'path' => resource_path('svg'),

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Here we store the default values which are not recommended to update unless
    | the package overrides your app definitions or consumes to much.
    | Assign 0 to 'cache.ttl' to disable the cache (default one day).
    |
    */

    'cache' => [
        'key' => 'sprite',
        'ttl' => 86400
    ],

    /*
    |--------------------------------------------------------------------------
    | Router
    |--------------------------------------------------------------------------
    |
    | If we're overriding one of your urls or package route is not reachable
    | please update the configuration in this section.
    |
    */

    'route' => [
        'prefix' => 'sprite',
        'as' => 'sprite.',
    ],
];
