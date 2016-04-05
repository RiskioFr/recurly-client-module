<?php
namespace Riskio\Recurly\ClientModule;

use Recurly_Client;
use Recurly_js;
use Zend\Loader\StandardAutoloader;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $config = $serviceManager->get('Riskio\Recurly\ClientModule\Config');

        if (empty($config['subdomain']) || empty($config['api_key'])) {
            return;
        }

        Recurly_Client::$subdomain = $config['subdomain'];
        Recurly_Client::$apiKey = $config['api_key'];

        if (isset($config['private_key'])) {
            Recurly_js::$privateKey = $config['private_key'];
        }
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            StandardAutoloader::class => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}