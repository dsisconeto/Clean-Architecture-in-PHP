<?php

namespace Web\Actions;


use DSisconeto\Product\CodeBar;
use DSisconeto\Product\ProductResource;
use DSisconeto\Product\UseCases\EditInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class Edit
 * @package Web\Actions
 * @mixin \Slim\Container
 */
class Edit
{
    /**
     * @param Request $request
     * @param Response $response
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __invoke(Request $request, Response $response)
    {
        /**
         * @var EditInterface $edit
         */
        $edit = $this->get(EditInterface::class);
        $data = $request->getParsedBody();
        $product = $edit->edit($data['id'], $data['name'], new CodeBar($data['code_bar']), $data['category_id']);
        $response->withJson(new ProductResource($product), 200);
    }
}