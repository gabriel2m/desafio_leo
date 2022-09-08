<?php

use app\Controllers\PagesController;
use app\Kernel\Route;

Route::add('GET', '', PagesController::class, 'home');
Route::add('DELETE', 'teste', PagesController::class, 'teste');
