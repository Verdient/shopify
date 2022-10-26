<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Events;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasDelete;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;
use Verdient\Shopify\REST\Traits\HasUpdate;

/**
 * 网络钩子
 * @author Verdient。
 */
class Webhook extends AbstractComponent
{
    use HasCreate;
    use HasCount;
    use HasUpdate;
    use HasDelete;
    use HasOne;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'webhooks';
    }
}
