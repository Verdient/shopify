<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Orders\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Traits\HasOne;

/**
 * 订单
 * @author Verdient。
 */
class Order extends AbstractComponent
{
    use HasOne;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'order';
    }
}
