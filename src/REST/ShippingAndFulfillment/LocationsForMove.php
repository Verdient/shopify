<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\ShippingAndFulfillment;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasList;

/**
 * 可以移动的位置
 * @author Verdient。
 */
class LocationsForMove extends AbstractComponent
{
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
        return 'fulfillment_orders/' . $this->fulfillmentOrderId . '/locations_for_move';
    }
}
