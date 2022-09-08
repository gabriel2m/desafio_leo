<?php

namespace app\Controllers;

use app\Kernel\Response;

/**
 * Controller of generic pages
 */
class PagesController extends Controller
{
    public function home()
    {
        return new Response('teste');
    }

    public function teste()
    {
        return new Response('testando');
    }
}
