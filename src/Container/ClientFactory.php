<?php

declare(strict_types=1);

namespace Riskio\Recurly\ClientModule\Container;

use Psr\Container\ContainerInterface;
use Recurly_Client;
use Recurly_js;
use Riskio\Recurly\ClientModule\ClientOptions;

class ClientFactory
{
    public function __invoke(ContainerInterface $container) : Recurly_Client
    {
        /* @var $clientOptions ClientOptions */
        $clientOptions = $container->get(ClientOptions::class);

        Recurly_Client::$subdomain = $clientOptions->getSubdomain();
        Recurly_Client::$apiKey = $clientOptions->getApiKey();

        $privateKey = $clientOptions->getPrivateKey();
        if ($privateKey) {
            Recurly_js::$privateKey = $privateKey;
        }

        return new Recurly_Client($clientOptions->getApiKey());
    }
}
