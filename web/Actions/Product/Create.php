<?php

namespace Web\Actions;

use DSisconeto\Product\CodeBar;
use DSisconeto\Product\ProductResource;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class Create
 * @package Web\Actions
 * @mixin \Slim\Container
 */
class Create
{

    /**
     * @param Request $request
     * @param Response $response
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __invoke(Request $request, Response $response)
    {
        /**
         * @var \DSisconeto\Product\\UseCases\CreateInterface $create
         */
        $create = $this->get(\DSisconeto\Product\UseCases\CreateInterface::class);
        $data = $request->getParsedBody();
        $product = $create->create($data['name'], new CodeBar($data['code_bar']), $data['category_id']);
        $response->withJson(new ProductResource($product), 200);
    }
}