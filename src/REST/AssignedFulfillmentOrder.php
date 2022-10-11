<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Iterator;
use Verdient\Shopify\Traits\HasList;

/**
 * 已分配的履约单
 * @author Verdient。
 */
class AssignedFulfillmentOrder extends AbstractComponent
{
    use HasList {
        HasList::iterator as iterator2;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'assigned_fulfillment_orders';
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function iterator($query, $bodyKey = 'fulfillment_orders'): Iterator
    {
        return $this->iterator2($query, $bodyKey);
    }
}
