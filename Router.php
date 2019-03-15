<?php

require 'Request.php';

class Router
{
    protected static $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function addGetRoute($action, $route)
    {
        if (! array_key_exists($action, static::$routes['GET'])) {
            static::$routes['GET'][$action] = $route;
        }        
    }

    public static function addPostRoute($action, $route)
    {
        if (! array_key_exists($action, static::$routes['POST'])) {
            static::$routes['POST'][$action] = $route;
        }        
    }

    public static function dispatch()
    {
        $action = Request::getAction();
        $method = Request::getMethod();

        if (! array_key_exists($action, static::$routes[$method])) {
            require 'views/404.php';
        } else {
            $route = static::$routes[$method][$action];
            list($controller, $method) = explode('@', $route);
            $controller::$method();
        }
    }
}

