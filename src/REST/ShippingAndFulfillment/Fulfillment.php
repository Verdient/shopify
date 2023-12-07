<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\ShippingAndFulfillment;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Response;
use Verdient\Shopify\REST\Traits\HasCancel;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 履约
 * @author Verdient。
 */
class Fulfillment extends AbstractComponent
{
    use HasCreate;
    use HasCancel;
    use HasOne;

    /**
     * 更新跟踪信息
     * @param int $id 履约编号
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function updateTracking($id, $data): Response
    {
        return $this->request($this->resource() . '/' . $id . '/update_tracking')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * 关联到订单的履约
     * @param int $orderId 订单编号
     * @return FulfillmentAssociatedOrder
     * @author Verdient。
     */
    public function associatedOrder($orderId): FulfillmentAssociatedOrder
    {
        return new FulfillmentAssociatedOrder($orderId, $this->host, $this->accessToken);
    }

    /**
     * 关联到履约单的履约
     * @param int $fulfillmentOrderId 履约单编号
     * @return FulfillmentAssociatedOrder
     * @author Verdient。
     */
    public function associatedFulfillmentOrder($fulfillmentOrderId): FulfillmentAssociatedFulfillmentOrder
    {
        return new FulfillmentAssociatedFulfillmentOrder($fulfillmentOrderId, $this->host, $this->accessToken);
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
