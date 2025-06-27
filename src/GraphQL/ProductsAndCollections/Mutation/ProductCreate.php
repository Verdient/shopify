<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ProductsAndCollections\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 创建商品
 * @author Verdient。
 */
class ProductCreate extends AbstractComponent
{
    use HasMutation;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function resource(): Mutation
    {
        return new Mutation(
            'product',
            'productCreate',
            ['product' => 'ProductCreateInput!', 'media' => '[CreateMediaInput!]']
        );
    }
}
