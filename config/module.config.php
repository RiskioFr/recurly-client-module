<?php
use Riskio\Recurly\ClientModule\ClientOptions;
use Riskio\Recurly\ClientModule\Container\ClientOptionsFactory;

return [
    'service_manager' => [
        'factories' => [
            ClientOptions::class => ClientOptionsFactory::class,
        ],
    ],
];
