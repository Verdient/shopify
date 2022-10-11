<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasCount;
use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasOne;

/**
 * 位置
 * @author Verdient。
 */
class Location extends AbstractComponent
{
    use HasOne;
    use HasList;
    use HasCount;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'locations';
    }
}
