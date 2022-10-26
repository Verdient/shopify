<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Events;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 事件
 * @author Verdient。
 */
class Event extends AbstractComponent
{
    use HasOne;
    use HasCount;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'events';
    }
}
