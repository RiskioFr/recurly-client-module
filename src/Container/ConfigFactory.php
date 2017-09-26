<?php
namespace Riskio\Recurly\ClientModule\Container;

use Psr\Container\ContainerInterface;
use Riskio\Recurly\ClientModule\Exception\RuntimeException;

class ConfigFactory
{
    public function __invoke(ContainerInterface $container) : array
    {
        $config = $container->get('Config');

        if (!isset($config['recurly'])) {
            throw new RuntimeException('Recurly configuration must be defined. Did you copy the config file?');
        }

        return $config['recurly'];
    }
}
