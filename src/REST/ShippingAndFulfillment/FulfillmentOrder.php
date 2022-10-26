<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\ShippingAndFulfillment;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Response;
use Verdient\Shopify\REST\Traits\HasCancel;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 履约单
 * @author Verdient。
 */
class FulfillmentOrder extends AbstractComponent
{
    use HasCancel;
    use HasOne;

    /**
     * 标记为未完成
     * @param string $id 编号
     * @return Response
     * @author Verdient。
     */
    public function close($id): Response
    {
        return $this->request($this->resource() . '/' . $id . '/close')
            ->setMethod('POST')
            ->send();
    }

    /**
     * 移动
     * @param string $id 编号
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function move($id, $data): Response
    {
        return $this->request($this->resource() . '/' . $id . '/move')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * 挂起
     * @param string $id 编号
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function hold($id, $data): Response
    {
        return $this->request($this->resource() . '/' . $id . '/hold')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * 打开
     * @param string $id 编号
     * @return Response
     * @author Verdient。
     */
    public function open($id): Response
    {
        return $this->request($this->resource() . '/' . $id . '/open')
            ->setMethod('POST')
            ->send();
    }

    /**
     * 解除挂起
     * @param string $id 编号
     * @return Response
     * @author Verdient。
     */
    public function releaseHold($id): Response
    {
        return $this->request($this->resource() . '/' . $id . '/release_hold')
            ->setMethod('POST')
            ->send();
    }

    /**
     * 重新计划
     * @param string $id 编号
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function reschedule($id, $data): Response
    {
        return $this->request($this->resource() . '/' . $id . '/reschedule')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * 设置履约单的截止时间
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function setFulfillmentOrdersDeadline($data): Response
    {
        return $this->request($this->resource() . '/set_fulfillment_orders_deadline')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * 关联到订单的履约单
     * @param int $orderId 订单编号
     * @return FulfillmentOrderAssociatedOrder
     * @author Verdient。
     */
    public function associatedOrder($orderId): FulfillmentOrderAssociatedOrder
    {
        return new FulfillmentOrderAssociatedOrder($orderId, $this->host, $this->accessToken);
    }

    /**
     * 履约
     * @param int $fulfillmentOrderId 履约单编号
     * @return FulfillmentAssociatedOrder
     * @author Verdient。
     */
    public function fulfillment($fulfillmentOrderId)
    {
        return new FulfillmentAssociatedFulfillmentOrder($fulfillmentOrderId, $this->host, $this->accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'fulfillment_orders';
    }
}
