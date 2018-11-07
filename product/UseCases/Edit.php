<?php

namespace DSisconeto\Product\UseCases;

use DSisconeto\Common\EntityNotFound;
use DSisconeto\Product\Category\RepositoryInterface as CategoryRepository;
use DSisconeto\Product\Exceptions\{
    DuplicateCodeBarException,
    DuplicateNameException
};
use DSisconeto\Product\{Category\Exceptions\CategoryNotFoundException,
    Product,
    CodeBar,
    RepositoryInterface as ProductRepository};


class Edit implements EditInterface
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

    public function edit(string $id, $name, CodeBar $codeBar, string $categoryId): Product
    {
        $product = $this->productRepository->find($id);
        $category = $this->categoryRepository->find($categoryId);

        if (is_null($product)) {
            throw new EntityNotFound();
        }
        if (is_null($category)) {
            throw new CategoryNotFoundException();
        }

        if ($this->productRepository->hasProductEqualCodeBarAndDifferedId($name, $id)) {
            throw new DuplicateNameException();
        }

        if ($this->productRepository->hasProductEqualCodeBarAndDifferedId($codeBar, $id)) {
            throw new DuplicateCodeBarException();

        }


        $product->setName($name);
        $product->setCategory($category);
        $product->setCodeBar($codeBar);

        $this->productRepository->update($product);
        return $product;

    }
}