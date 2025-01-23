<?php

declare(strict_types=1);

namespace Domain\Services;

use Infrastructure\Exceptions\ApiRequestException;
use Infrastructure\Http\ApiClient;
use Domain\Entities\Payout;
use Domain\ValueObjects\PaymentStatus;
use Domain\Exceptions\InvalidPaymentDataException;

class PayoutService
{
    private ApiClient $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @throws InvalidPaymentDataException
     * @throws ApiRequestException
     */
    public function create(array $payoutData): Payout
    {
        if (empty($payoutData['amount']) || empty($payoutData['currency'])) {
            throw new InvalidPaymentDataException('Amount and currency are required.');
        }

        $response = $this->apiClient->request('POST', '/payouts', $payoutData);

        $status = new PaymentStatus($response['status']);

        return new Payout($response['id'], $response['amount'], $response['currency'], (string) $status);
    }

    /**
     * @throws ApiRequestException
     */
    public function getStatus(string $payoutId): PaymentStatus
    {
        $response = $this->apiClient->request('GET', "/payouts/{$payoutId}");

        return new PaymentStatus($response['status']);
    }
}
