<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\StoreProperties\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Resource;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 位置
 * @author Verdient。
 */
class Locations extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Resource
    {
        return new Resource('locations');
    }
}
