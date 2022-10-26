<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Products;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasDelete;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;
use Verdient\Shopify\REST\Traits\HasUpdate;

/**
 * 商品
 * @author Verdient。
 */
class Product extends AbstractComponent
{
    use HasCreate;
    use HasUpdate;
    use HasCount;
    use HasOne;
    use HasList;
    use HasDelete;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'products';
    }
}
