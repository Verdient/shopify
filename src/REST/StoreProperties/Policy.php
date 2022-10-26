<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\StoreProperties;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasList;

/**
 * 政策
 * @author Verdient。
 */
class Policy extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'policies';
    }
}
