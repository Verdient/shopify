<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Traits;

use Exception;
use Iterator;
use Verdient\HttpAPI\Result;
use Verdient\Shopify\GraphQL\Response;
use Verdient\Shopify\GraphQL\Objects;

/**
 * 包含获取列表
 * @author Verdient。
 */
trait HasList
{
    /**
     * 获取列表
     * @param array $fields 字段集合
     * @param array $params 检索参数
     * @author Verdient。
     */
    public function list($fields, $params = []): Response
    {
        if (empty($params['first']) && empty($params['last'])) {
            $params['first'] = 100;
        }

        $resource = $this->resource();

        if (is_string($resource)) {
            $query = Objects::toQuery([
                'query' => [
                    $resource => [
                        '__params__' => $params,
                        'nodes' => $fields,
                        'pageInfo' => [
                            'hasNextPage',
                            'endCursor',
                            'hasPreviousPage',
                            'startCursor'
                        ]
                    ]
                ]
            ]);
        } else {
            $query = Objects::toQuery([
                'query' => [
                    $resource[0] => [
                        '__params__' => $resource[1],
                        $resource[2] => [
                            '__params__' => $params,
                            'nodes' => $fields,
                            'pageInfo' => [
                                'hasNextPage',
                                'endCursor',
                                'hasPreviousPage',
                                'startCursor'
                            ]
                        ]
                    ]
                ]
            ]);
        }

        $res = $this
            ->request()
            ->setContent($query)
            ->send();

        if ($res->getIsOK()) {
            $result = new Result;
            $result->isOK = true;
            if (is_string($resource)) {
                $result->data = $res->$resource;
            } else {
                $key1 = $resource[0];
                $data = $res->$key1;
                if (!empty($data)) {
                    $data = $data[$resource[2]];
                }
                $result->data = empty($data) ? [
                    'nodes' => [],
                    'pageInfo' => [
                        'hasNextPage' => false,
                        'endCursor' => null,
                        'hasPreviousPage' => false,
                        'startCursor' => null
                    ]
                ] : $data;
            }
            return Response::fromResult($result, $res);
        }

        return $res;
    }

    /**
     * 批量迭代
     * @param array $fields 字段集合
     * @param array $params 检索参数
     * @return Iterator
     * @author Verdient。
     */
    public function batch($fields, $params = []): Iterator
    {
        return $this->iterator($fields, $params);
    }

    /**
     * 单个迭代
     * @param array $fields 字段集合
     * @param array $params 检索参数
     * @return Iterator
     * @author Verdient。
     */
    public function each($fields, $params = []): Iterator
    {
        foreach ($this->iterator($fields, $params) as $rows) {
            foreach ($rows as $row) {
                yield $row;
            }
        }
    }

    /**
     * 迭代器
     * @param array $fields 字段集合
     * @param array $params 检索参数
     * @return Iterator
     * @author Verdient。
     */
    public function iterator($fields, $params = []): Iterator
    {
        $continue = true;
        while ($continue) {
            $continue = false;
            $exception = null;
            for ($i = 0; $i < 3; $i++) {
                try {
                    $res = $this->list($fields, $params);
                    $exception = null;
                    break;
                } catch (\Throwable $e) {
                    $exception = $e;
                }
            }
            if ($exception) {
                throw $exception;
            }
            if (!$res->getIsOK()) {
                throw new Exception($res->getErrorMessage());
            }
            $body = $res->getData();
            yield $body['nodes'];
            $pageInfo = $body['pageInfo'];
            if ($continue = $pageInfo['hasNextPage']) {
                $params['after'] = $pageInfo['endCursor'];
            }
        }
    }
}
