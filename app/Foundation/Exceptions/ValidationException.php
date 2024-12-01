<?php

namespace App\Foundation\Exceptions;

use Exception;

class ValidationException extends Exception
{
    protected $code = 400;
}
