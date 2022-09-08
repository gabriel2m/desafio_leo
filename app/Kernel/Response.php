<?php

namespace app\Kernel;

class Response implements ResponseInterface
{
    public function __construct(private string $data, private int $code = 200)
    {
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getData()
    {
        return $this->data;
    }
}
