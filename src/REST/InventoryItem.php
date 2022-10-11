<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasOne;
use Verdient\Shopify\Traits\HasUpdate;

/**
 * 库存条目
 * @author Verdient。
 */
class InventoryItem extends AbstractComponent
{
    use HasOne;
    use HasList;
    use HasUpdate;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'inventory_items';
    }
}
