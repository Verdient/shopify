<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Traits;

use Verdient\HttpAPI\Result;
use Verdient\Shopify\GraphQL\Response;
use Verdient\Shopify\GraphQL\Objects;
use Verdient\Shopify\GraphQL\Request;

/**
 * 包含查询自身
 * @author Verdient。
 */
trait HasItself
{
    use HasQuery;

    /**
     * 获取
     * @param array $fields 字段集合
     * @param array $params 检索参数
     * @return Response
     * @author Verdient。
     */
    public function get($fields, $params = [])
    {
        $resource = $this->resource();

        $field = $this->resource()->getField();

        if (empty($field)) {
            $queryContents = $fields;
            $queryParams = $params;
        } else {
            $queryContents = [
                $field => array_merge([
                    '__params__' => $params,
                ], $fields)
            ];
            $queryParams = $resource->getParams();
        }

        $name = $resource->getName();

        $query = Objects::toQuery([
            'query' => [
                $name => array_merge([
                    '__params__' => $queryParams
                ], $queryContents)
            ]
        ]);

        /** @var Request */
        $request = $this->request();

        $res = $request
            ->setBody(['query' => $query])
            ->send();

        if ($res->getIsOK()) {
            $result = new Result;
            $result->isOK = true;
            $result->data = $res->$name;
            return Response::fromResult($result, $res);
        }

        return $res;
    }
}
