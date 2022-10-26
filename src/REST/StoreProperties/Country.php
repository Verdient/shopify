<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\StoreProperties;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasDelete;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;
use Verdient\Shopify\REST\Traits\HasUpdate;

/**
 * 国家
 * @author Verdient。
 */
class Country extends AbstractComponent
{
    use HasCreate;
    use HasUpdate;
    use HasCount;
    use HasDelete;
    use HasOne;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'countries';
    }
}
