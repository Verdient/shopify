<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Inventory;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasList;

/**
 * 关联到位置的库存水平
 * @author Verdient。
 */
class InventoryLevelAssociatedLocation extends AbstractComponent
{
    use HasList;

    /**
     * @var int 位置编号
     * @author Verdient。
     */
    protected $locationId = null;

    /**
     * @inheritdoc
     * @param int $locationId 位置编号
     * @author Verdient。
     */
    public function __construct($locationId, $host, $accessToken)
    {
        $this->locationId = $locationId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'locations/' . $this->locationId . '/inventory_levels';
    }
}
