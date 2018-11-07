<?php

namespace DSisconeto\Common;

use DomainException;
use Throwable;

class EntityNotFound extends DomainException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}