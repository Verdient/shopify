<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasCount;
use Verdient\Shopify\Traits\HasCreate;
use Verdient\Shopify\Traits\HasDelete;
use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasOne;
use Verdient\Shopify\Traits\HasUpdate;

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
