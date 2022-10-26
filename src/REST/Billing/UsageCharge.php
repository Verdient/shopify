<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Billing;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 使用量费用
 * @author Verdient。
 */
class UsageCharge extends AbstractComponent
{
    use HasCreate;
    use HasOne;
    use HasList;

    /**
     * @var int 应用周期性费用编号
     * @author Verdient。
     */
    protected $recurringApplicationChargeId = null;

    /**
     * @inheritdoc
     * @param int $recurringApplicationChargeId 应用周期性费用编号
     * @author Verdient。
     */
    public function __construct($recurringApplicationChargeId, $host, $accessToken)
    {
        $this->recurringApplicationChargeId = $recurringApplicationChargeId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'recurring_application_charges/' . $this->recurringApplicationChargeId . '/usage_charges';
    }
}
