<?php

namespace App\Foundation\Exceptions;

use Exception;

class DuplicateEntryException extends Exception
{
    protected $code = 409;
}
