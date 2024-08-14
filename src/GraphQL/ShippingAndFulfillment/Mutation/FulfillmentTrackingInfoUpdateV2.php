<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 更新履约跟踪信息
 * @author Verdient。
 */
class FulfillmentTrackingInfoUpdateV2 extends AbstractComponent
{
    use HasMutation;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function resource(): Mutation
    {
        return new Mutation(
            'fulfillment',
            'fulfillmentTrackingInfoUpdateV2',
            [
                'fulfillmentId' => 'ID!',
                'trackingInfoInput' => 'FulfillmentTrackingInput!',
                'notifyCustomer' => 'Boolean'
            ]
        );
    }
}
