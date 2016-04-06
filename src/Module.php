<?php
namespace Riskio\Recurly\ClientModule;

use Recurly_Client;
use Recurly_js;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $config = $serviceManager->get('Riskio\Recurly\ClientModule\Config');

        if (!empty($config['subdomain']) && !empty($config['api_key'])) {
            $this->configureRecurlyClient($config);
        }
    }

    private function configureRecurlyClient(array $config)
    {
        Recurly_Client::$subdomain = $config['subdomain'];
        Recurly_Client::$apiKey    = $config['api_key'];

        if (isset($config['private_key'])) {
            Recurly_js::$privateKey = $config['private_key'];
        }
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}