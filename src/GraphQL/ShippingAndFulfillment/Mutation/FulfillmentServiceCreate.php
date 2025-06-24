<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 创建履约服务
 * @author Verdient。
 */
class FulfillmentServiceCreate extends AbstractComponent
{
    use HasMutation;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function resource(): Mutation
    {
        return new Mutation(
            'fulfillmentService',
            'fulfillmentServiceCreate',
            [
                'name' => 'String!',
                'callbackUrl' => 'URL!',
                'inventoryManagement' => 'Boolean',
                'requiresShippingMethod' => 'Boolean',
                'trackingSupport' => 'Boolean'
            ]
        );
    }
}
