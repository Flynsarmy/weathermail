<?php

namespace Flynsarmy\WeatherMail;

use Dotenv\Dotenv;
use Flynsarmy\WeatherMail\Traits\Singleton;

class Bootstrap
{
    use Singleton;

    protected function init(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
    }
}
