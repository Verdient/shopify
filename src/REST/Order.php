<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasCount;
use Verdient\Shopify\Traits\HasCreate;
use Verdient\Shopify\Traits\HasDelete;
use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasOne;
use Verdient\Shopify\Traits\HasUpdate;

/**
 * 订单
 * @author Verdient。
 */
class Order extends AbstractComponent
{
    use HasCreate;
    use HasUpdate;
    use HasCount;
    use HasOne;
    use HasList;
    use HasDelete;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'orders';
    }

    /**
     * 履约单
     * @param int $orderId 订单编号
     * @return Response
     * @author Verdient。
     */
    public function fulfillmentOrders($orderId): Response
    {
        return $this
            ->request($this->resource() . '/' . $orderId . '/fulfillment_orders')
            ->send();
    }
}
