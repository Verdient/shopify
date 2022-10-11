<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasCount;
use Verdient\Shopify\Traits\HasCreate;
use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasOne;

/**
 * 交易
 * @author Verdient。
 */
class Transaction extends AbstractComponent
{
    use HasCreate;
    use HasOne;
    use HasList;
    use HasCount;

    /**
     * @var int 订单编号
     * @author Verdient。
     */
    protected $orderId = null;

    /**
     * @inheritdoc
     * @param int $orderId 订单编号
     * @author Verdient。
     */
    public function __construct($orderId, $host, $accessToken)
    {
        $this->orderId = $orderId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'orders/' . $this->orderId . '/transactions';
    }
}
