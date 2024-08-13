<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 关联到履约单的履约
 * @author Verdient。
 */
class FulfillmentAssociatedFulfillmentOrder extends AbstractComponent
{
    use HasList;

    /**
     * @var int|string 履约单编号
     * @author Verdient。
     */
    protected $fulfillmentOrderId;

    /**
     * @inheritdoc
     * @param int|string $fulfillmentOrderId 履约单编号
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($fulfillmentOrderId, $host, $accessToken)
    {
        $this->fulfillmentOrderId = $this->toGid($fulfillmentOrderId);
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query('fulfillmentOrder', 'fulfillments', ['id' => $this->fulfillmentOrderId], true);
    }
}
