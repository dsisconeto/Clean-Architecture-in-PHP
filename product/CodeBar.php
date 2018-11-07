<?php

namespace DSisconeto\Product;


class CodeBar
{
    /**
     * @var string
     */
    private $code;

    public function __construct(string $code)
    {
        // verificar se o código é valido
        $this->code = $code;
    }

    public function __toString()
    {
        return $this->code;
    }
}