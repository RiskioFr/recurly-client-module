<?php
declare(strict_types=1);

namespace Riskio\Recurly\ClientModule;

final class ConfigProvider
{
    public function __invoke() : array
    {
        $config = (new Module())->getConfig();

        return [
            'recurly' => $config['recurly'],
            'dependencies' => $config['service_manager'],
        ];
    }
}
