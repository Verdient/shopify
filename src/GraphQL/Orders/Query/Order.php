<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Orders\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\ShippingAndFulfillment\Query\FulfillmentAssociatedOrder;
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
     * @return LineItems
     * @author Verdient。
     */
    public function lineItems($orderId): LineItems
    {
        return $this->createInstance(LineItems::class, $orderId);
    }

    /**
     * 履约单
     * @param int $orderId 订单编号
     * @return FulfillmentOrderAssociatedOrder
     * @author Verdient。
     */
    public function fulfillmentOrders($orderId): FulfillmentOrderAssociatedOrder
    {
        return $this->createInstance(FulfillmentOrderAssociatedOrder::class, $orderId);
    }

    /**
     * 履约
     * @param int $orderId 订单编号
     * @return FulfillmentAssociatedOrder
     * @author Verdient。
     */
    public function fulfillments($orderId): FulfillmentAssociatedOrder
    {
        return $this->createInstance(FulfillmentAssociatedOrder::class, $orderId);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query('order');
    }
}
