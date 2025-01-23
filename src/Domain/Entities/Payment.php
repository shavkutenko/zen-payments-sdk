<?php

declare(strict_types=1);

namespace Domain\Entities;

use Domain\ValueObjects\PaymentStatus;

class Payment
{
    public function __construct(
        private string $id,
        private float $amount,
        private string $currency,
        private PaymentStatus $status
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getStatus(): PaymentStatus
    {
        return $this->status;
    }
}
