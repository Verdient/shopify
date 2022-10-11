<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasOne;

/**
 * 履约单
 * @author Verdient。
 */
class FulfillmentOrder extends AbstractComponent
{
    use HasOne;

    /**
     * 移动
     * @param string $id 编号
     * @param string $locationId 新的位置编号
     * @return Response
     * @author Verdient。
     */
    public function move($id, $locationId): Response
    {
        return $this->request($this->resource() . '/' . $id . '/move')
            ->setMethod('POST')
            ->setBody([
                'fulfillment_order' => [
                    'new_location_id' => $locationId
                ]
            ])
            ->send();
    }

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
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'fulfillment_orders';
    }
}
