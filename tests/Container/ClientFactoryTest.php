<?php
namespace Riskio\Recurly\ClientModuleTest\Container;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Recurly_Client;
use Riskio\Recurly\ClientModule\ClientOptions;
use Riskio\Recurly\ClientModule\Container\ClientFactory;

class ClientFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $subdomain = 'foo';
        $apiKey = 'bar';
        $privateKey = 'baz';
        $clientOptions = new ClientOptions($subdomain, $apiKey, $privateKey);

        $container = $this->prophesize(ContainerInterface::class);
        $container->get(ClientOptions::class)->willReturn($clientOptions);

        $factory = new ClientFactory();

        $client = $factory($container->reveal());
        $this->assertInstanceOf(Recurly_Client::class, $client);
    }
}
