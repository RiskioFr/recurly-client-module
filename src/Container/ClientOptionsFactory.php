<?php

declare(strict_types=1);

namespace Riskio\Recurly\ClientModule\Container;

use Psr\Container\ContainerInterface;
use Riskio\Recurly\ClientModule\ClientOptions;
use Riskio\Recurly\ClientModule\Exception\InvalidConfigException;

class ClientOptionsFactory
{
    public function __invoke(ContainerInterface $container) : ClientOptions
    {
        $config = $container->get('Config');

        if (!isset($config['recurly']) || !is_array($config['recurly'])) {
            throw new InvalidConfigException('recurly');
        }
        if (!isset($config['recurly']['subdomain']) || !is_string($config['recurly']['subdomain'])) {
            throw new InvalidConfigException('recurly.subdomain');
        }
        if (!isset($config['recurly']['api_key']) || !is_string($config['recurly']['api_key'])) {
            throw new InvalidConfigException('recurly.api_key');
        }
        if (isset($config['recurly']['private_key']) && !is_string($config['recurly']['private_key'])) {
            throw new InvalidConfigException('recurly.private_key');
        }

        return new ClientOptions(
            $config['recurly']['subdomain'],
            $config['recurly']['api_key'],
            $config['recurly']['private_key'] ?? null
        );
    }
}
