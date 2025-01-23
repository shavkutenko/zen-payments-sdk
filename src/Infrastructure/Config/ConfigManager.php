<?php

declare(strict_types=1);

namespace Infrastructure\Config;

use Dotenv\Dotenv;

class ConfigManager
{
    private array $config;

    public function __construct(string $envPath)
    {
        $dotenv = Dotenv::createImmutable($envPath);
        $dotenv->load();
        $this->config = $_ENV;
    }

    public function get(string $key, $default = null): mixed
    {
        return $this->config[$key] ?? $default;
    }
}
