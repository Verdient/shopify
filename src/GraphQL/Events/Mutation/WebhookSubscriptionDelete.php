<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Events\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 删除Webhook订阅
 * @author Verdient。
 */
class WebhookSubscriptionDelete extends AbstractComponent
{
    use HasMutation;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function resource(): Mutation
    {
        return new Mutation(
            'webhookSubscription',
            'webhookSubscriptionDelete',
            [
                'id' => 'ID!'
            ]
        );
    }
}
