<?php
use Riskio\Recurly\ClientModule\Container\ConfigFactory;

return [
    'recurly' => [
        'subdomain' => null,
        'api_key' => null,
        'private_key' => null,
    ],

    'service_manager' => [
        'factories' => [
            'Riskio\Recurly\ClientModule\Config' => ConfigFactory::class,
        ],
    ],
];
