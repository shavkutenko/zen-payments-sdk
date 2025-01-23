<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

readonly class PaymentStatus
{
    private const array ALLOWED_STATUSES = ['pending', 'completed', 'failed'];

    private string $status;

    public function __construct(string $status)
    {
        if (!in_array($status, self::ALLOWED_STATUSES, true)) {
            throw new \InvalidArgumentException("Invalid payment status: {$status}");
        }

        $this->status = $status;
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function __toString(): string
    {
        return $this->status;
    }
}
