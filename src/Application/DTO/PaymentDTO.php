<?php

declare(strict_types=1);

namespace Application\DTO;

class PaymentDTO
{
    public function __construct(
        public string $id,
        public float $amount,
        public string $currency,
        public string $status
    ) {}
}
