<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 关联到履约的履约单
 * @author Verdient。
 */
class FulfillmentOrderAssociatedFulfillment extends AbstractComponent
{
    use HasList;

    /**
     * @var int|string 履约编号
     * @author Verdient。
     */
    protected $fulfillmentId;

    /**
     * @inheritdoc
     * @param int|string $fulfillmentId 履约编号
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($fulfillmentId, $host, $accessToken)
    {
        $this->fulfillmentId = $this->toGid($fulfillmentId);
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query('fulfillment', 'fulfillmentOrders', ['id' => $this->fulfillmentId]);
    }
}
