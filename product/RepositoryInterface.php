<?php

namespace DSisconeto\Product;

interface RepositoryInterface
{
    public function store(Product $product): void;

    public function update(Product $product): void;

    public function find(string $id): Product;

    public function hasProductEqualName(string $name): bool;

    public function hasProductEqualCodeBar(CodeBar $codeBar): bool;

    public function hasProductEqualNameAndDifferedId(string $name, string $id): bool;

    public function hasProductEqualCodeBarAndDifferedId(CodeBar $codeBar, string $id): bool;
}