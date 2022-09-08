<?php

namespace app\Exceptions;

class NotFoundException extends HttpException
{
    public function __construct(string $message = "Not Found", int $code = 404, \Throwable $previous = null)
    {
        parent::__construct(...compact('message', 'code', 'previous'));
    }
}
