<?php

namespace DSisconeto\Product\UseCases;

use DSisconeto\Product\Category\Category;
use DSisconeto\Product\Category\RepositoryInterface as CategoryRepository;
use DSisconeto\Product\CodeBar;
use DSisconeto\Product\RepositoryInterface as ProductRepository;
use Mockery;


class CreateTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @expectedException \DSisconeto\Product\Exceptions\DuplicateNameException
     */
    public function testCreateWithDuplicateName()
    {
        $productRepository = Mockery::mock(ProductRepository::class);
        $categoryRepository = Mockery::mock(CategoryRepository::class);
        $name = "Notebook Ace";
        $codeBar = new CodeBar('98560');
        $categoryId = uniqid();
        $category = new Category($categoryId, 'Computadores');

        $categoryRepository->shouldReceive('find')
            ->with($categoryId)
            ->andReturn($category);

        $productRepository->shouldReceive('hasProductEqualName')
            ->with($name)
            ->andReturn(true);

        $productRepository->shouldReceive('hasProductEqualCodeBar')
            ->with($codeBar)
            ->andReturn(false);

        $useCaseCreate = new Create($productRepository, $categoryRepository);
        $useCaseCreate->create($name, $codeBar, $categoryId);
    }

    /**
     * @expectedException  \DSisconeto\Product\Exceptions\DuplicateCodeBarException
     */
    public function testCreateWithDuplicateCodeBar()
    {
        $productRepository = Mockery::mock(ProductRepository::class);
        $categoryRepository = Mockery::mock(CategoryRepository::class);
        $name = "Notebook Ace";
        $codeBar = new CodeBar('98560');
        $categoryId = uniqid();
        $category = new Category($categoryId, 'Computadores');

        $categoryRepository->shouldReceive('find')
            ->with($categoryId)
            ->andReturn($category);

        $productRepository->shouldReceive('hasProductEqualName')
            ->with($name)
            ->andReturn(false);

        $productRepository->shouldReceive('hasProductEqualCodeBar')
            ->with($codeBar)
            ->andReturn(true);

        $useCaseCreate = new Create($productRepository, $categoryRepository);
        $useCaseCreate->create($name, $codeBar, $categoryId);

    }


}