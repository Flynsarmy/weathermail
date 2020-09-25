<?php

namespace Flynsarmy\WeatherMail;

use Laminas\Feed\Reader\Reader as LaminasReader;
use Laminas\Feed\Reader\Feed\FeedInterface;

class Reader
{
    public FeedInterface $feed;

    public array $forecasts;

    /**
     * Undocumented function
     *
     * @param string $feed
     * @throws \Laminas\Feed\Reader\Exception\RuntimeException
     */
    public function __construct(string $feed)
    {
        $this->feed = LaminasReader::import($feed);

        // Move to forecast
        $this->feed->rewind();
        $this->feed->next();

        $this->forecasts = $this->readForecasts();
    }

    public function output(): string
    {
        return $this->feed->current()->getContent();
    }

    public function readForecasts(): array
    {
        // A list of attributes to read on each forecast record in the feed
        $forecastAttribs = ['day', 'description', 'min', 'max', 'iconUri'];
        $forecasts = [];

        // Grab the individual forecast data for each of the 3 days given
        $xpath = $this->feed->current()->getXpath();
        foreach ($xpath->query('//w:forecast') as $forecastData) {
            $forecast = [];

            foreach ($forecastAttribs as $attribute) {
                $forecast[$attribute] = $forecastData->getAttribute($attribute);
            }

            $forecasts[] = $forecast;
        }

        return $forecasts;
    }
}
