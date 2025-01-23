<?php

declare(strict_types=1);

namespace Domain\Exceptions;

class PaymentNotFoundException extends DomainException
{
    public function __construct(string $message = "Payment not found.")
    {
        parent::__construct($message);
    }
}
