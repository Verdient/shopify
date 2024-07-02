<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Traits;

use Verdient\HttpAPI\Result;
use Verdient\Shopify\GraphQL\Response;
use Verdient\Shopify\GraphQL\Objects;

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
     * @return Response
     * @author Verdient。
     */
    public function get($fields)
    {
        $name = $this->resource()->getName();

        $query = Objects::toQuery([
            'query' => [
                $name => $fields
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
