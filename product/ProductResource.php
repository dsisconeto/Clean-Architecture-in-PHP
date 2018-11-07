<?php


namespace DSisconeto\Product;


use DSisconeto\Product\Category\CategoryResource;
use JsonSerializable;

class ProductResource implements JsonSerializable
{

    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function jsonSerialize()
    {
        return [
            'name' => $this->product->getName(),
            'code_bar' => (string)$this->product->getCodeBar(),
            'category' => new  CategoryResource($this->product->getCategory()),
        ];
    }
}