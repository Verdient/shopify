<?php

declare(strict_types=1);

namespace Verdient\Shopify\Traits;

use Verdient\Shopify\REST\Response;

/**
 * 包含更新
 * @author Verdient。
 */
trait HasUpdate
{
    /**
     * 更新
     * @param string $id 编号
     * @param array $data 要更新的数据
     * @return Response
     * @author Verdient。
     */
    public function update($id, $data): Response
    {
        return $this->request($this->resource() . '/' . $id)
            ->setMethod('PUT')
            ->setBody($data)
            ->send();
    }
}
