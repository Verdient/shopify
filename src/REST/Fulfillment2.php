<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasCreate;
use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasOne;

/**
 * 履约
 * @author Verdient。
 */
class Fulfillment2 extends AbstractComponent
{
    use HasCreate;
    use HasOne;
    use HasList;

    /**
     * 关闭
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

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'fulfillments';
    }
}
