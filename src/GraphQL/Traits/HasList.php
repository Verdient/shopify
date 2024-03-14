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
    use HasQuery;

    /**
     * 获取列表
     * @param array $fields 字段集合
     * @param array $params 检索参数
     * @author Verdient。
     */
    public function list($fields, $params = []): Response
    {
        $resource = $this->resource();

        $usePagination = $resource->getUsePagination();

        if ($usePagination) {
            if (empty($params['first']) && empty($params['last'])) {
                $params['first'] = 50;
            }

            if (!array_key_exists('reverse', $params)) {
                $params['reverse'] = true;
            }

            $fields = [
                'nodes' => $fields,
                'pageInfo' => [
                    'hasNextPage',
                    'endCursor',
                    'hasPreviousPage',
                    'startCursor'
                ]
            ];
        }

        $field = $resource->getField();

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

        $res = $this
            ->request()
            ->setContent($query)
            ->send();

        if ($res->getIsOK()) {
            $result = new Result;
            $result->isOK = true;

            $data = $res->$name;
            if ($field) {
                if (!empty($data)) {
                    $data = $data[$field];
                }
            }

            if (empty($data)) {
                $result->data = [
                    'nodes' => [],
                    'pageInfo' => [
                        'hasNextPage' => false,
                        'endCursor' => null,
                        'hasPreviousPage' => false,
                        'startCursor' => null
                    ]
                ];
            } else {
                if ($usePagination) {
                    $result->data = $data;
                } else {
                    $result->data = [
                        'nodes' => $data,
                        'pageInfo' => [
                            'hasNextPage' => false,
                            'endCursor' => null,
                            'hasPreviousPage' => false,
                            'startCursor' => null
                        ]
                    ];
                }
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
