<?php

namespace App\Foundation\Exceptions;

use Exception;

class UnauthenticatedException extends Exception
{
    protected $code = 401;

    protected $message = 'Unauthenticated';
}
