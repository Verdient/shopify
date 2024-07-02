<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\StoreProperties\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasItself;

/**
 * 店铺
 * @author Verdient。
 */
class Shop extends AbstractComponent
{
    use HasItself;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query('shop');
    }
}
