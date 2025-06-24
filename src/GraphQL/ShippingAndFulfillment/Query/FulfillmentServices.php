<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasItself;

/**
 * 已注册的履约服务
 * @author Verdient。
 */
class FulfillmentServices extends AbstractComponent
{
    use HasItself;

    /**
     * @inheritdoc
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($host, $accessToken)
    {
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query(
            'shop',
            'fulfillmentServices',
            [],
            false
        );
    }
}
