<?php

declare(strict_types=1);

namespace Infrastructure\Exceptions;

class ApiRequestException extends InfrastructureException
{
    public function __construct(string $message, int $code = 0, ?\Exception $previous = null)
    {
        parent::__construct('API Request Error: ' . $message, $code, $previous);
    }
}

