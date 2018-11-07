<?php

namespace DSisconeto\Product\UseCases;


use DSisconeto\Product\CodeBar;
use DSisconeto\Product\Product;

interface EditInterface
{
    public function edit(string $id, $name, CodeBar $codeBar, string $categoryId): Product;
}