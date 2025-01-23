<?php

declare(strict_types=1);

namespace Domain\Entities;

class Payout
{
    public function __construct(
        private string $id,
        private float $amount,
        private string $currency,
        private string $status
    ) {}

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

    public function getStatus(): string
    {
        return $this->status;
    }
}
