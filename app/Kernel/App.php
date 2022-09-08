<?php

namespace app\Kernel;

use app\Exceptions\HttpException;
use app\Exceptions\InternalServerErrorException;

class App implements AppInterface
{
    private static array $configs;

    public function __construct(array $configs)
    {
        static::$configs = $configs;
    }

    public function run()
    {
        try {
            try {
                $response = Route::resolve();
            } catch (\Throwable $th) {
                throw $th instanceof HttpException || static::config('debug')
                    ? $th
                    : new InternalServerErrorException;
            }
        } catch (HttpException $e) {
            $response = new Response($e->getMessage(), $e->getCode());
        }
        http_response_code($response->getCode());
        echo $response->getData();
    }

    /**
     * Return a config or set it if $val is provided
     */
    public static function config(string $config, mixed $val = null)
    {
        if (isset($val)) {
            static::$configs[$config] = $val;
        } else {
            return static::$configs[$config] ?? null;
        }
    }
}
