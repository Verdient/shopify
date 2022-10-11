<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasDetail;

/**
 * 店铺
 * @author Verdient。
 */
class Shop extends AbstractComponent
{
    use HasDetail;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'shop';
    }
}
