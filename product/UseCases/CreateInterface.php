<?php

namespace DSisconeto\Product\UseCases;

use DSisconeto\Product\CodeBar;
use DSisconeto\Product\Product;

interface CreateInterface
{
    public function create(string $name, CodeBar $codeBar, string $categoryId): Product;
}