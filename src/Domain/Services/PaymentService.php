<?php

declare(strict_types=1);

namespace Domain\Services;

use Infrastructure\Exceptions\ApiRequestException;
use Infrastructure\Http\ApiClient;
use Domain\Entities\Payment;
use Domain\ValueObjects\PaymentStatus;
use Domain\Exceptions\PaymentNotFoundException;

class PaymentService
{
    private ApiClient $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @throws ApiRequestException
     */
    public function create(array $paymentData): Payment
    {
        $response = $this->apiClient->request('POST', '/payments', $paymentData);
        return new Payment(
            $response['id'],
            $response['amount'],
            $response['currency'],
            new PaymentStatus($response['status'])
        );
    }

    /**
     * @throws PaymentNotFoundException
     * @throws ApiRequestException
     */
    public function getStatus(string $paymentId): PaymentStatus
    {
        $response = $this->apiClient->request('GET', "/payments/{$paymentId}");

        if (!isset($response['status'])) {
            throw new PaymentNotFoundException("Payment with ID {$paymentId} not found.");
        }

        return new PaymentStatus($response['status']);
    }
}
