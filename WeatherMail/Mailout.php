<?php

namespace Flynsarmy\WeatherMail;

use Mailgun\Mailgun;

class Mailout
{
    public function __construct(string $subject, string $content)
    {
        $mg = Mailgun::create($_ENV['MAILGUN_API']);
        $mg->messages()->send($_ENV['MAILGUN_DOMAIN'], [
            'from'    => $_ENV['MAIL_FROM'],
            'to'      => $_ENV['MAIL_TO'],
            'subject' => $subject,
            'html'    => $content,
        ]);
    }
}
