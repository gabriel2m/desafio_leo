<?php

namespace app\Kernel;

interface AppInterface
{
    public function run();
    public static function config(string $config, mixed $val);
}
