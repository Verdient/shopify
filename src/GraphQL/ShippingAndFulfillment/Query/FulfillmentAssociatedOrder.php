<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Resource;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 关联到订单的履约
 * @author Verdient。
 */
class FulfillmentAssociatedOrder extends AbstractComponent
{
    use HasList;

    /**
     * @var int|string 订单编号
     * @author Verdient。
     */
    protected $orderId;

    /**
     * @inheritdoc
     * @param int|string $orderId 订单编号
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($orderId, $host, $accessToken)
    {
        $this->orderId = $this->toGid($orderId);
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Resource
    {
        return new Resource('order', 'fulfillments', ['id' => $this->orderId], false);
    }
}
