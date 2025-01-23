<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use Exception;

class DomainException extends Exception
{
    public function __construct(string $message, int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
