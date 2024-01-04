<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ProductsAndCollections\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Traits\HasOne;

/**
 * 商品
 * @author Verdient。
 */
class Product extends AbstractComponent
{
    use HasOne;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'product';
    }
}
