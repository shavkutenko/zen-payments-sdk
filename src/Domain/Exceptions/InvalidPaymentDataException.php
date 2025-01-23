<?php

declare(strict_types=1);

namespace Domain\Exceptions;

class InvalidPaymentDataException extends DomainException
{
    public function __construct(string $message = "Invalid payment data provided.")
    {
        parent::__construct($message);
    }
}
