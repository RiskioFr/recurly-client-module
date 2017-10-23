<?php
use Riskio\Recurly\ClientModule\ClientOptions;
use Riskio\Recurly\ClientModule\Container\ClientOptionsFactory;

return [
    'recurly' => [
        'subdomain' => null,
        'api_key' => null,
        'private_key' => null,
    ],

    'service_manager' => [
        'factories' => [
            ClientOptions::class => ClientOptionsFactory::class,
        ],
    ],
];
