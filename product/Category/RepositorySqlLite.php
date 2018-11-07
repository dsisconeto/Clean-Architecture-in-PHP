<?php

namespace DSisconeto\Product\Category;


class RepositorySqlLite implements RepositoryInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(string $id): Category
    {
        // TODO: Implement find() method.
    }
}