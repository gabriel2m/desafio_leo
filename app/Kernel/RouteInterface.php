<?php

namespace app\Kernel;

interface RouteInterface
{
    public static function add(string $method, string $uri, string $controller, string $action);

    public static function resolve(): ResponseInterface;
}
