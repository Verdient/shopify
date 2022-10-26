<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Orders;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;

/**
 * 交易
 * @author Verdient。
 */
class Transaction extends AbstractComponent
{
    use HasCount;
    use HasCreate;
    use HasOne;
    use HasList;

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
