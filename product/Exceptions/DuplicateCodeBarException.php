<?php

namespace DSisconeto\Product\Exceptions;

use DomainException;
use Throwable;


class DuplicateCodeBarException extends DomainException
{
    public function __construct(int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Não pode existir dois produtos com o mesmo código de barras', $code, $previous);
    }

}