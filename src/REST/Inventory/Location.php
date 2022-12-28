<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Inventory;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;

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
     * 检索位置的库存水平列表
     * @param int $locationId 位置编号
     * @return InventoryLevelAssociatedLocation
     * @author Verdient。
     */
    public function inventoryLevels($locationId): InventoryLevelAssociatedLocation
    {
        return new InventoryLevelAssociatedLocation($locationId, $this->host, $this->accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'locations';
    }
}
