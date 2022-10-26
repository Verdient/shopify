<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Traits;

use Verdient\Shopify\REST\Response;

/**
 * 包含获取总数
 * @author Verdient。
 */
trait HasCount
{
    /**
     * 获取总数
     * @param array $query 检索条件
     * @return Response
     * @author Verdient。
     */
    public function count($query = []): Response
    {
        return $this->request($this->resource() . '/count')->setQuery($query)->send();
    }
}
