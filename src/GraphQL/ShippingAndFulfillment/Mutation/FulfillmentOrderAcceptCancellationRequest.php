<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ShippingAndFulfillment\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 履约单接受履约取消请求
 * @author Verdient。
 */
class FulfillmentOrderAcceptCancellationRequest extends AbstractComponent
{
    use HasMutation;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function resource(): Mutation
    {
        return new Mutation(
            'fulfillmentOrder',
            'fulfillmentOrderAcceptCancellationRequest',
            ['id' => 'ID!', 'message' => 'String']
        );
    }
}
