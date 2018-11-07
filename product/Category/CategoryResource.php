<?php

namespace DSisconeto\Product\Category;
use JsonSerializable;

class CategoryResource implements JsonSerializable
{

    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->category->getId(),
            'name' => $this->category->getName()
        ];
    }


}