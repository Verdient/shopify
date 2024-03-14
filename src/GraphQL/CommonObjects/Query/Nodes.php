<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\CommonObjects\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 节点集合
 * @author Verdient。
 */
class Nodes extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Query
    {
        return new Query('nodes', null, [], false);
    }
}
