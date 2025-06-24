<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 删除履约服务
 * @author Verdient。
 */
class FulfillmentServiceDelete extends AbstractComponent
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
            'fulfillmentServiceDelete',
            [
                'id' => 'ID!',
                'destinationLocationId' => 'ID',
                'inventoryAction' => 'FulfillmentServiceDeleteInventoryAction'
            ]
        );
    }
}
