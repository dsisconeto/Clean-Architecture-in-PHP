<?php

namespace DSisconeto\Product;

use DomainException;
use DSisconeto\Product\Category\Category;

class Product
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var CodeBar
     */
    private $codeBar;
    /**
     * @var Category
     */
    private $category;


    public function __construct(
        string $id,
        string $name,
        CodeBar $codeBar,
        Category $category
    )
    {
        if (strlen($this->name) > 2) {
            throw  new DomainException('Nome do produto precisa ser maior que 2');
        }
        $this->id = $id;
        $this->name = $name;
        $this->codeBar = $codeBar;
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return CodeBar
     */
    public function getCodeBar(): CodeBar
    {
        return $this->codeBar;
    }

    /**
     * @param CodeBar $codeBar
     */
    public function setCodeBar(CodeBar $codeBar): void
    {
        $this->codeBar = $codeBar;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }


}