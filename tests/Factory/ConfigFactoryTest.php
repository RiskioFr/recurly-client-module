<?php
namespace Riskio\Recurly\ClientModuleTest\Factory;

use Riskio\Recurly\ClientModule\Exception\RuntimeException;
use Riskio\Recurly\ClientModule\Factory\ConfigFactory;
use Zend\ServiceManager\ServiceManager;

class ConfigFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateService()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', [
            'recurly' => [],
        ]);

        $factory = new ConfigFactory();

        $config = $factory($serviceManager);
        $this->assertInternalType('array', $config);
    }

    /**
     * @expectedException \Riskio\Recurly\ClientModule\Exception\RuntimeException
     */
    public function testCreateServiceWithoutRecurlyConfigKey()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', []);

        $factory = new ConfigFactory();

        $this->setExpectedException(RuntimeException::class);
        $config = $factory($serviceManager);
        $this->assertInternalType('array', $config);
    }
}