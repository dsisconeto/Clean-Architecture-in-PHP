<?php

namespace DSisconeto\Product\UseCases;

use DSisconeto\Product\Category\{
    Exceptions\CategoryNotFoundException,
    RepositoryInterface as CategoryRepository
};
use DSisconeto\Product\{
    Exceptions\DuplicateCodeBarException,
    Exceptions\DuplicateNameException,
    Product,
    CodeBar,
    RepositoryInterface as ProductRepository};


class Create implements CreateInterface
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;


    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    )
    {

        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }


    public function create(string $name, CodeBar $codeBar, string $categoryId): Product
    {
        $category = $this->categoryRepository->find($categoryId);

        if (is_null($category)) {
            throw new CategoryNotFoundException();
        }

        if ($this->productRepository->hasProductEqualName($name)) {
            throw new DuplicateNameException();
        }

        if ($this->productRepository->hasProductEqualCodeBar($codeBar)) {
            throw new DuplicateCodeBarException();
        }


        $product = new Product(
            uniqid(),
            $name,
            $codeBar,
            $category
        );

        $this->productRepository->store($product);
        return $product;
    }
}