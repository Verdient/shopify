<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\StoreProperties;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasList;

/**
 * 货币
 * @author Verdient。
 */
class Currency extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'currencies';
    }
}
