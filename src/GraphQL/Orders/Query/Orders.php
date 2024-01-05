<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Orders\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Resource;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 订单
 * @author Verdient。
 */
class Orders extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Resource
    {
        return new Resource('orders');
    }
}
