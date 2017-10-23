<?php

declare(strict_types=1);

namespace Riskio\Recurly\ClientModule;

class ClientOptions
{
    /**
     * @var string
     */
    private $subdomain;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $privateKey;

    public function __construct(string $subdomain, string $apiKey, string $privateKey = null)
    {
        $this->subdomain = $subdomain;
        $this->apiKey = $apiKey;
        $this->privateKey = $privateKey;
    }

    public function getSubdomain() : string
    {
        return $this->subdomain;
    }

    public function getApiKey() : string
    {
        return $this->apiKey;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }
}
