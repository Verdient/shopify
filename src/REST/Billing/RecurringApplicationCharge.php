<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Billing;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasDelete;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 应用周期性费用
 * @author Verdient。
 */
class RecurringApplicationCharge extends AbstractComponent
{
    use HasCreate;
    use HasOne;
    use HasDelete;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'recurring_application_charges';
    }
}
