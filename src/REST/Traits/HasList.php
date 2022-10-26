<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Traits;

use Iterator;
use Verdient\Shopify\REST\Response;

/**
 * 包含获取列表
 * @author Verdient。
 */
trait HasList
{
    /**
     * 获取列表
     * @param array $query 检索条件
     * @return Response
     * @author Verdient。
     */
    public function list($query = []): Response
    {
        return $this->request($this->resource())->setQuery($query)->send();
    }

    /**
     * 批量迭代
     * @param array $query 检索条件
     * @return Iterator
     * @author Verdient。
     */
    public function batch($query = []): Iterator
    {
        return $this->iterator($query);
    }

    /**
     * 单个迭代
     * @param array $query 检索条件
     * @return Iterator
     * @author Verdient。
     */
    public function each($query = []): Iterator
    {
        foreach ($this->iterator($query) as $rows) {
            foreach ($rows as $row) {
                yield $row;
            }
        }
    }

    /**
     * 迭代器
     * @param array $query 查询条件
     * @return Iterator
     * @author Verdient。
     */
    public function iterator($query): Iterator
    {
        /**
         * @var Response
         */
        $response = $this->list($query);
        $continue = true;
        while ($continue) {
            $continue = false;
            if ($response->getIsOK()) {
                $body = $response->getData();
                yield reset($body);
                $headers = $response->getResponse()->getHeaders();
                $link = $headers['link'] ?? ($headers['Link'] ?? null);
                if ($link) {
                    foreach (explode(', ', $link) as $ref) {
                        $ref = explode('; ', $ref);
                        if ($ref[1] === 'rel="next"') {
                            $url = substr($ref[0], 1, -1);
                            $response = $this->request($this->resource())->setUrl($url)->send();
                            $continue = true;
                            break;
                        }
                    }
                }
            }
        }
    }
}
