<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Orders\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Resource;
use Verdient\Shopify\GraphQL\ShippingAndFulfillment\Query\FulfillmentOrderAssociatedOrder;
use Verdient\Shopify\GraphQL\Traits\HasOne;

/**
 * 订单
 * @author Verdient。
 */
class Order extends AbstractComponent
{
    use HasOne;

    /**
     * 履约单
     * @param int $orderId 订单编号
     * @return FulfillmentOrderAssociatedOrder
     * @author Verdient。
     */
    public function fulfillmentOrder($orderId): FulfillmentOrderAssociatedOrder
    {
        return new FulfillmentOrderAssociatedOrder($orderId, $this->host, $this->accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Resource
    {
        return new Resource('order');
    }
}
