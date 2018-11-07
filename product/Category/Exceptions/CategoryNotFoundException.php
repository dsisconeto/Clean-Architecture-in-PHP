<?php

namespace DSisconeto\Product\Category\Exceptions;

use DomainException;

use Throwable;

class CategoryNotFoundException extends DomainException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}