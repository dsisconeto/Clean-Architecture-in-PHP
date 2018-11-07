<?php

namespace DSisconeto\Product;


use PDO;

class RepositorySqlLite implements RepositoryInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function store(Product $product): void
    {
        $sql = "INSERT INTO product ('id', ''name', 'code_bar', 'category_id')";
        $sql .= "VALUES (:id, :name, :code_bar, :category_id)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $product->getId());
        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':code_bar', $product->getCodeBar());
        $statement->bindValue(':category_id', $product->getCategory()->getId());
        $statement->execute();
    }

    public function find(string $id): Product
    {
        // TODO: Implement find() method.
    }

    public function hasProductEqualName(string $name): bool
    {
        return false;
    }

    public function hasProductEqualCodeBar(CodeBar $codeBar): bool
    {
        return false;
    }

    public function update(Product $product): void
    {
        // TODO: Implement update() method.
    }

    public function hasProductEqualNameAndDifferedId(string $name, string $id): bool
    {
        // TODO: Implement hasProductEqualNameAndDifferedId() method.
    }

    public function hasProductEqualCodeBarAndDifferedId(CodeBar $codeBar, string $id): bool
    {
        // TODO: Implement hasProductEqualCodeBarAndDifferedId() method.
    }
}