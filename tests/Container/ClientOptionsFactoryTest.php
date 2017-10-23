<?php
namespace Riskio\Recurly\ClientModuleTest\Container;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Riskio\Recurly\ClientModule\ClientOptions;
use Riskio\Recurly\ClientModule\Exception\InvalidConfigException;
use Riskio\Recurly\ClientModule\Container\ClientOptionsFactory;

class ClientOptionsFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $config = [
            'recurly' => [
                'subdomain' => 'foo',
                'api_key' => 'bar',
                'private_key' => 'baz',
            ],
        ];

        $container = $this->prophesize(ContainerInterface::class);
        $container->get('Config')->willReturn($config);

        $factory = new ClientOptionsFactory();

        $clientOptions = $factory($container->reveal());
        $this->assertInstanceOf(ClientOptions::class, $clientOptions);
        $this->assertSame($config['recurly']['subdomain'], $clientOptions->getSubdomain());
        $this->assertSame($config['recurly']['api_key'], $clientOptions->getApiKey());
        $this->assertSame($config['recurly']['private_key'], $clientOptions->getPrivateKey());
    }

    public function testCreateServiceWithoutRecurlyConfigKey()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get('Config')->willReturn([]);

        $factory = new ClientOptionsFactory();

        $this->expectException(InvalidConfigException::class);
        $factory($container->reveal());
    }
}
