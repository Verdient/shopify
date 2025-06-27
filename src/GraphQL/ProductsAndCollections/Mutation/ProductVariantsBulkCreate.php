<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\ProductsAndCollections\Mutation;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Mutation;
use Verdient\Shopify\GraphQL\Traits\HasMutation;

/**
 * 批量创建商品变体
 * @author Verdient。
 */
class ProductVariantsBulkCreate extends AbstractComponent
{
    use HasMutation;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function resource(): Mutation
    {
        return new Mutation(
            'productVariants',
            'productVariantsBulkCreate',
            [
                'productId' => 'ID!',
                'strategy' => 'ProductVariantsBulkCreateStrategy',
                'variants' => '[ProductVariantsBulkInput!]!'
            ]
        );
    }
}
