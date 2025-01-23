<?php

declare(strict_types=1);

namespace Infrastructure\Exceptions;

class ConfigException extends InfrastructureException
{
    public function __construct(string $message, int $code = 0, ?\Exception $previous = null)
    {
        parent::__construct('Configuration Error: ' . $message, $code, $previous);
    }
}
