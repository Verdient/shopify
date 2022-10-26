<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Analytics;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasDelete;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;
use Verdient\Shopify\REST\Traits\HasUpdate;

/**
 * 报告
 * @author Verdient。
 */
class Report extends AbstractComponent
{
    use HasCreate;
    use HasOne;
    use HasUpdate;
    use HasDelete;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'reports';
    }
}
