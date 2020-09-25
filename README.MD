# Weather Email

Sends an email containing the current weather to you as often as you like.

## Installation

* `git clone`
* `composer install --no-dev`
* `cp .env.sample .env` and fill in details accordingly
* Add a cron for `php -f index.php`

## Notes

This script uses the site [https://weather.com.au](weather.com.au)'s RSS feeds, it'll need tweaking to use any other site.