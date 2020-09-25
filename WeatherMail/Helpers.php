<?php

namespace Flynsarmy\WeatherMail;

class Helpers
{
    public static function arrayGet(array $array, $key, $default = null)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }

    public static function requireWith(string $filepath, array $vars = []): string
    {
        extract($vars);

        ob_start();
            require $filepath;
        return ob_get_clean();
    }

    public static function currentUrl(): string
    {
        return "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    }

    public static function GET(string $var, $default = null)
    {
        return isset($_GET[$var]) ? $_GET[$var] : $default;
    }

    public static function POST(string $var, $default = null)
    {
        return isset($_POST[$var]) ? $_POST[$var] : $default;
    }

    public static function REQUEST(string $var, $default = null)
    {
        return isset($_REQUEST[$var]) ? $_REQUEST[$var] : $default;
    }

    public static function SERVER(string $var, $default = null)
    {
        return isset($_SERVER[$var]) ? $_SERVER[$var] : $default;
    }
}
