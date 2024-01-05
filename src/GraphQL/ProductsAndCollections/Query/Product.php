<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ProductsAndCollections\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Resource;
use Verdient\Shopify\GraphQL\Traits\HasOne;

/**
 * 商品
 * @author Verdient。
 */
class Product extends AbstractComponent
{
    use HasOne;

    /**
     * 图片
     * @param int|string $productId 商品编号
     * @return ProductImage
     * @author Verdient。
     */
    public function image($productId)
    {
        return new ProductImage($productId, $this->host, $this->accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Resource
    {
        return new Resource('product');
    }
}
