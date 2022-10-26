<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Billing;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 应用预付
 * @author Verdient。
 */
class ApplicationCredit extends AbstractComponent
{
    use HasCreate;
    use HasOne;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'application_credits';
    }
}
