<?php
namespace Riskio\Recurly\ClientModuleTest\Factory;

use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Riskio\Recurly\ClientModule\Exception\RuntimeException;
use Riskio\Recurly\ClientModule\Factory\ConfigFactory;

class ConfigFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get('Config')->willReturn([
            'recurly' => [],
        ]);

        $factory = new ConfigFactory();

        $config = $factory($container->reveal());
        $this->assertInternalType('array', $config);
    }

    public function testCreateServiceWithoutRecurlyConfigKey()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get('Config')->willReturn([]);

        $factory = new ConfigFactory();

        $this->expectException(RuntimeException::class);
        $factory($container->reveal());
    }
}
