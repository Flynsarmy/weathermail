# Weather Email

Sends an email containing the current weather to you as often as you like.

## Installation

* `git clone` to some folder on your server
* `composer install --no-dev`
* `cp .env.sample .env` and fill in details accordingly
* Add a cron for `php -f index.php` as often as you'd like to receive the email

## Notes

* In `.env` file you can set the weather email recipient, which area to show weather for etc.
* The email you receive will contain 3 days worth of weather forecasts starting today.
* This script uses the site [https://weather.com.au](weather.com.au)'s RSS feeds, it'll need tweaking to use any other site.