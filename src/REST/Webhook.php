<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasCount;
use Verdient\Shopify\Traits\HasCreate;
use Verdient\Shopify\Traits\HasDelete;
use Verdient\Shopify\Traits\HasDetail;
use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasUpdate;

/**
 * 网络钩子
 * @author Verdient。
 */
class Webhook extends AbstractComponent
{
    use HasCreate;
    use HasList;
    use HasDetail;
    use HasCount;
    use HasUpdate;
    use HasDelete;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'webhooks';
    }
}
