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
 * 商品图片
 * @author Verdient。
 */
class ProductImage extends AbstractComponent
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
        return 'products/' . $this->productId . '/images';
    }
}
