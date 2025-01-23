<?php

declare(strict_types=1);

namespace Application;

use Infrastructure\Http\ApiClient;
use Domain\Services\PaymentService;
use Domain\Services\PayoutService;
use Infrastructure\Config\ConfigManager;

class ZenPaymentsSdk
{
    private ApiClient $apiClient;

    public function __construct(string $envPath)
    {
        $configManager = new ConfigManager($envPath);
        $this->apiClient = new ApiClient($configManager);
    }

    public function payment(): PaymentService
    {
        return new PaymentService($this->apiClient);
    }

    public function payout(): PayoutService
    {
        return new PayoutService($this->apiClient);
    }
}
