<?php

namespace Utils;

class Request
{
    public static function getAction()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}

