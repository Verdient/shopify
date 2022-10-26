<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Inventory;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Response;
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
     * @return Response
     * @author Verdient。
     */
    public function inventoryLevels($locationId): Response
    {
        return $this
            ->request($this->resource() . '/' . $locationId . '/inventory_levels')
            ->send();
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
