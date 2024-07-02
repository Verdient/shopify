<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Events\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * Webhook订阅
 * @author Verdient。
 */
class WebhookSubscriptions extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query('webhookSubscriptions');
    }
}
