<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Inventory;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;
use Verdient\Shopify\REST\Traits\HasUpdate;

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
