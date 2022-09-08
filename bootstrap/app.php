<?php

use app\Kernel\App;

require_once __DIR__ . '/autoload.php';
require dirname(__DIR__) . '/routes/web.php';

return new App(require dirname(__DIR__) . '/config/app.php');