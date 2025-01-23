<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

readonly class Currency
{
    public function __construct(private string $currencyCode)
    {
        if (!preg_match('/^[A-Z]{3}$/', $currencyCode)) {
            throw new \InvalidArgumentException('Invalid currency code.');
        }
    }

    public function __toString(): string
    {
        return $this->currencyCode;
    }
}

