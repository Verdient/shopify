<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\ShippingAndFulfillment;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasList;

/**
 * 已分配的履约单
 * @author Verdient。
 */
class AssignedFulfillmentOrder extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'assigned_fulfillment_orders';
    }
}
