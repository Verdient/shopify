<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Orders;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Response;
use Verdient\Shopify\REST\ShippingAndFulfillment\FulfillmentAssociatedOrder;
use Verdient\Shopify\REST\ShippingAndFulfillment\FulfillmentOrderAssociatedOrder;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasDelete;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;
use Verdient\Shopify\REST\Traits\HasUpdate;

/**
 * 订单
 * @author Verdient。
 */
class Order extends AbstractComponent
{
    use HasCreate;
    use HasUpdate;
    use HasDelete;
    use HasCount;
    use HasOne;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'orders';
    }

    /**
     * 取消
     * @param int $orderId 订单编号
     * @return Response
     * @author Verdient。
     */
    public function cancel($orderId): Response
    {
        return $this->request($this->resource() . '/' . $orderId . '/cancel')
            ->setMethod('POST')
            ->send();
    }

    /**
     * 关闭
     * @param int $orderId 订单编号
     * @return Response
     * @author Verdient。
     */
    public function close($orderId): Response
    {
        return $this->request($this->resource() . '/' . $orderId . '/close')
            ->setMethod('POST')
            ->send();
    }

    /**
     * 重新打开
     * @param int $orderId 订单编号
     * @return Response
     * @author Verdient。
     */
    public function open($orderId): Response
    {
        return $this->request($this->resource() . '/' . $orderId . '/open')
            ->setMethod('POST')
            ->send();
    }

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
     * 履约
     * @param int $orderId 订单编号
     * @return FulfillmentAssociatedOrder
     * @author Verdient。
     */
    public function fulfillment($orderId): FulfillmentAssociatedOrder
    {
        return new FulfillmentAssociatedOrder($orderId, $this->host, $this->accessToken);
    }
}
