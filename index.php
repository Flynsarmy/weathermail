<?php

require_once __DIR__ . '/vendor/autoload.php';

use Flynsarmy\WeatherMail\Bootstrap;
use Flynsarmy\WeatherMail\Mailout;
use Flynsarmy\WeatherMail\Reader;

Bootstrap::instance();

try {
    $reader = new Reader($_ENV['FEED']);

    $subject = 'Todays Forecast is ' . $reader->forecasts[0]['description'];
    $content = $reader->output();
} catch (Exception $e) {
    $subject = "Todays Forecast: Error retrieving forecast";
    $content = "Exception caught importing feed: {$e->getMessage()}";
}

new Mailout($subject, $content);
