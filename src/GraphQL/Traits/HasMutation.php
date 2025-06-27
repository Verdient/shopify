<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Traits;

use Verdient\HttpAPI\Result;
use Verdient\Shopify\GraphQL\Expression;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Objects;
use Verdient\Shopify\GraphQL\Request;
use Verdient\Shopify\GraphQL\Response;
use Verdient\Shopify\Utils;

/**
 * 包含变更
 * @author Verdient。
 */
trait HasMutation
{
    /**
     * 资源
     * @author Verdient。
     */
    abstract protected function resource(): Mutation;

    /**
     * 转换为GID
     * @author Verdient。
     */
    public function toGid($id): string
    {
        return Utils::toGid($this->resource()->getName(), $id);
    }

    /**
     * 变更
     * @param array $variables 参数集合
     * @param array $fields 字段集合
     * @return Response
     * @author Verdient。
     */
    public function mutation(array $variables, array $fields = [])
    {
        $resource = $this->resource();
        $method = $resource->getMethod();
        $params = $resource->getParams();

        foreach (array_keys($params) as $key) {
            if (!array_key_exists($key, $variables)) {
                unset($params[$key]);
            }
        }

        $__params__ = [];
        $__params__2 = [];

        foreach ($params as $name => $inputEntity) {
            $variable = '$' . $name;
            $__params__[$name] = new Expression($variable);
            $__params__2[$variable] = new Expression($inputEntity);
        }

        $params = [
            '__params__' => $__params__
        ];

        if (!empty($fields)) {
            $params = array_merge($params, $fields);
        }

        $params['userErrors'] = [
            'field',
            'message'
        ];

        $query = Objects::toQuery([
            'mutation ' . $method => [
                '__params__' => $__params__2,
                $method => $params
            ]
        ]);

        /** @var Request */
        $request = $this->request();
        $request->setBody([
            'query' => $query,
            'variables' => $variables
        ]);

        $res = $request->send();

        if ($res->getIsOK()) {
            $resData = $res->getData();
            if (isset($resData[$method])) {
                if (empty($resData[$method]['userErrors'])) {
                    $result = new Result;
                    $result->isOK = true;
                    $result->data = $resData[$method] ?? null;
                    return Response::fromResult($result, $res);
                } else {
                    $errors = array_column($resData[$method]['userErrors'], 'message');
                    $result = new Result;
                    $result->isOK = false;
                    $result->errorMessage = count($errors) > 1 ? json_encode($errors) : $errors[0];
                    return Response::fromResult($result, $res);
                }
            } else {
                $result = new Result;
                $result->isOK = false;
                $result->errorMessage = json_encode($resData);
                return Response::fromResult($result, $res);
            }
        }

        return $res;
    }
}
