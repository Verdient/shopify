<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ProductsAndCollections\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 商品图片
 * @author Verdient。
 */
class ProductImage extends AbstractComponent
{
    use HasList;

    /**
     * @var int|string 商品编号
     * @author Verdient。
     */
    protected $productId;

    /**
     * @inheritdoc
     * @param int|string $productId 商品编号
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($productId, $host, $accessToken)
    {
        $this->productId = $this->toGid($productId);
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query(
            'product',
            'images',
            ['id' => $this->productId],
        );
    }
}
