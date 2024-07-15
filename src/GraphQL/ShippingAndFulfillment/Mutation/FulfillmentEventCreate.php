<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 创建履约事件
 * @author Verdient。
 */
class FulfillmentEventCreate extends AbstractComponent
{
    use HasMutation;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function resource(): Mutation
    {
        return new Mutation(
            'fulfillmentEvent',
            'fulfillmentEventCreate',
            ['fulfillmentEvent' => 'FulfillmentEventInput!']
        );
    }
}
