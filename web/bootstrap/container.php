<?php
/**
 * @var \Slim\App $app
 */


use Slim\Container;

$container = new Container;

$container[PDO::class] = function () {
    return new PDO(getenv('DB_STRING'));
};

$container[DSisconeto\Product\Category\RepositoryInterface::class] = function (Container $container) {
    return new \DSisconeto\Product\Category\RepositorySqlLite($container->get(PDO::class));
};

$container[\DSisconeto\Product\Category\RepositoryInterface::class] = function (Container $container) {
    return new \DSisconeto\Product\Category\RepositorySqlLite($container->get(PDO::class));
};

$container[DSisconeto\Product\UseCases\CreateInterface::class] = function (Container $container) {
    $categoryRepository = $container->get(\DSisconeto\Product\Category\RepositoryInterface::class);
    $productRepository = $container->get(\DSisconeto\Product\Category\RepositoryInterface::class);
    return new DSisconeto\Product\UseCases\Create($productRepository, $categoryRepository);
};