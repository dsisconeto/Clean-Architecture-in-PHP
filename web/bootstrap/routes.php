<?php
/**
 * @var \Slim\App $app
 */
$app->get('/products', \Web\Actions\All::class);
$app->post('/products', \Web\Actions\Create::class);
$app->get('/products/{id}', \Web\Actions\Show::class);
$app->put('/products/{id}', \Web\Actions\Edit::class);
$app->delete('/products/{id}', \Web\Actions\Destroy::class);
