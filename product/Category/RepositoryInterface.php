<?php

namespace DSisconeto\Product\Category;


interface RepositoryInterface
{
    public function find(string $id): Category;
}