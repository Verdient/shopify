<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Traits;

use Verdient\Shopify\REST\Response;

/**
 * 包含取消
 * @author Verdient。
 */
trait HasCancel
{
    /**
     * 取消
     * @param string $id 编号
     * @return Response
     * @author Verdient。
     */
    public function cancel($id): Response
    {
        return $this->request($this->resource() . '/' . $id . '/cancel')
            ->setMethod('POST')
            ->send();
    }
}
