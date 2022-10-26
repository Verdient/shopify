<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\ShippingAndFulfillment;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasList;

/**
 * 关联到订单的履约单
 * @author Verdient。
 */
class FulfillmentOrderAssociatedOrder extends AbstractComponent
{
    use HasList;

    /**
     * @var int 订单编号
     * @author Verdient。
     */
    protected $orderId = null;

    /**
     * @inheritdoc
     * @param int $orderId 订单编号
     * @author Verdient。
     */
    public function __construct($orderId, $host, $accessToken)
    {
        $this->orderId = $orderId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'orders/' . $this->orderId . '/fulfillment_orders';
    }
}
