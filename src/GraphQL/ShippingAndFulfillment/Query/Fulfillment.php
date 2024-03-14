<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasOne;

/**
 * 履约
 * @author Verdient。
 */
class Fulfillment extends AbstractComponent
{
    use HasOne;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query('fulfillment');
    }
}
