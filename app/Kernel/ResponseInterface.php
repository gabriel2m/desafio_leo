<?php

namespace app\Kernel;

interface ResponseInterface
{
    public function getCode();
    public function getData();
}
