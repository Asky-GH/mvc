<?php

class Router
{
    protected static $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function addGetRoute($action, $route)
    {
        static::$routes['GET'][$action] = $route;     
    }

    public static function addPostRoute($action, $route)
    {
        static::$routes['POST'][$action] = $route;     
    }

    public static function dispatch()
    {
        $action = Request::getAction();
        $method = Request::getMethod();

        if (! array_key_exists($action, static::$routes[$method])) {
            header('Location: /404');
        } else {
            $route = static::$routes[$method][$action];
            list($controller, $method) = explode('@', $route);
            $controller::$method();
        }
    }
}

