<?php
namespace Router;

class Router
{
    private static $routes = [];

    // Static method to register routes with HTTP methods
    public static function add($method, $path, $callback)
    {
        $method = strtoupper($method);
        self::$routes[$method][$path] = $callback;
    }

    // Static method to dispatch the request URI based on the request method
    public static function dispatch($requestUri, $requestMethod)
    {
        $requestMethod = strtoupper($requestMethod);

        if (isset(self::$routes[$requestMethod][$requestUri])) {
            call_user_func(self::$routes[$requestMethod][$requestUri]);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    // Static method for redirecting to another route
    public static function redirect($path)
    {
        header("Location: " . $path);
        exit;
    }
}
