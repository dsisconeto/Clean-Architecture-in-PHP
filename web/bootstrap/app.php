<?php
require __DIR__ . '/../../vendor/autoload.php';

$app = new \Slim\App();
(new Dotenv\Dotenv(__DIR__ . "/..", '.env'))->load();

require_once __DIR__ . '/container.php';
require_once __DIR__ . '/routes.php';


try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}