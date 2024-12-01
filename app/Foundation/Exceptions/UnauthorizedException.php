<?php

namespace App\Foundation\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    protected $code = 401;

    protected $message = 'Unauthorized';
}
