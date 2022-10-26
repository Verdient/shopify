<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\ShippingAndFulfillment;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 关联到履约单的履约
 * @author Verdient。
 */
class FulfillmentAssociatedFulfillmentOrder extends AbstractComponent
{
    use HasCount;
    use HasOne;
    use HasList;

    /**
     * @var int 履约单编号
     * @author Verdient。
     */
    protected $fulfillmentOrderId = null;

    /**
     * @inheritdoc
     * @param int $fulfillmentOrderId 履约单编号
     * @author Verdient。
     */
    public function __construct($fulfillmentOrderId, $host, $accessToken)
    {
        $this->fulfillmentOrderId = $fulfillmentOrderId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'fulfillment_orders/' . $this->fulfillmentOrderId . '/fulfillments';
    }
}
