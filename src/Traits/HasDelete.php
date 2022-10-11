<?php

declare(strict_types=1);

namespace Verdient\Shopify\Traits;

use Verdient\Shopify\REST\Response;

/**
 * 包含删除
 * @author Verdient。
 */
trait HasDelete
{
    /**
     * 删除
     * @param int $id 编号
     * @return Response
     * @author Verdient。
     */
    public function delete($id): Response
    {
        return $this->request($this->resource() . '/' . $id)
            ->setMethod('DELETE')
            ->send();
    }
}
