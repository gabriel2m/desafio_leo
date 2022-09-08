<?php

namespace app\Exceptions;

class InternalServerErrorException extends HttpException
{
    public function __construct(string $message = "Internal Server Error", int $code = 500, \Throwable $previous = null)
    {
        parent::__construct(...compact('message', 'code', 'previous'));
    }
}
