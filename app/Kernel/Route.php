<?php

namespace app\Kernel;

use app\Controllers\ControllerInterface;
use app\Exceptions\NotFoundException;
use UnexpectedValueException;

/**
 * Manage the route list and call the corresponding action of the current request
 */
class Route implements RouteInterface
{
    /**
     * List of registered route with: string $method, string $uri, string $controller, string $action
     */
    private static array $routes;

    /**
     * Add a route to routes list
     * @param string $method Http Method
     * @param string $uri Regular expression of the request uri path
     * @param string $controller Controller class
     * @param string $action Controller method
     */
    public static function add(string $method, string $uri, string $controller, string $action)
    {
        $uri = "/^\/$uri$/";
        static::$routes[] = compact('method', 'uri', 'controller', 'action');
    }

    /**
     * Resolve the current request by calling the corresponding action in the routes list
     */
    public static function resolve(): ResponseInterface
    {
        foreach (static::$routes as $route) {
            extract($route);
            if (
                $_SERVER['REQUEST_METHOD'] == $method
                && preg_match($uri, parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
            ) {
                if (is_a($controller, ControllerInterface::class, true))
                    return (new $controller)->$action();
                throw new UnexpectedValueException("\"$controller\" its not a implementation of \"" . ControllerInterface::class . '"');
            }
        }
        throw new NotFoundException;
    }
}
