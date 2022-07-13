<?php

declare(strict_types=1);

namespace config;

use Symfony\Component\Dotenv\Dotenv;

class Config
{
    public function __construct(string $path)
    {
        $dotenv = new Dotenv();
        $dotenv->load($path);
    }
}
