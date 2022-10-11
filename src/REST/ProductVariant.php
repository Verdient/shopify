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
 * 商品变体
 * @author Verdient。
 */
class ProductVariant extends AbstractComponent
{
    use HasCreate;
    use HasUpdate;
    use HasCount;
    use HasOne;
    use HasList;
    use HasDelete;

    /**
     * @var int 商品编号
     * @author Verdient。
     */
    protected $productId = null;

    /**
     * @inheritdoc
     * @param int $productId 商品编号
     * @author Verdient。
     */
    public function __construct($productId, $host, $accessToken)
    {
        $this->productId = $productId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'products/' . $this->productId . '/variants';
    }
}
