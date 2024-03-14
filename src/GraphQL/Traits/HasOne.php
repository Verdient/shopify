<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Traits;

use Verdient\HttpAPI\Result;
use Verdient\Shopify\GraphQL\Response;
use Verdient\Shopify\GraphQL\Objects;

/**
 * 包含获取单个
 * @author Verdient。
 */
trait HasOne
{
    use HasQuery;

    /**
     * 获取单个条目
     * @param array $fields 字段集合
     * @param int $id 编号
     * @return Response
     * @author Verdient。
     */
    public function one($fields, $id)
    {
        $name = $this->resource()->getName();

        $query = Objects::toQuery([
            'query' => [
                $name => array_merge([
                    '__params__' => ['id' => $this->toGid($id)],
                ], $fields)
            ]
        ]);

        $res = $this
            ->request()
            ->setContent($query)
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
