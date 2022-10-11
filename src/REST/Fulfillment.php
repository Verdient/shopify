<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasCreate;
use Verdient\Shopify\Traits\HasList;
use Verdient\Shopify\Traits\HasOne;
use Verdient\Shopify\Traits\HasUpdate;

/**
 * 履约
 * @author Verdient。
 */
class Fulfillment extends AbstractComponent
{
    use HasCreate;
    use HasUpdate;
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
     * 关闭
     * @param string $id 编号
     * @return Response
     * @author Verdient。
     */
    public function cancel($id): Response
    {
        return $this->request($this->resource() . '/' . $id . '/cancel')
            ->setMethod('POST')
            ->send();
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'orders/' . $this->orderId . '/fulfillments';
    }
}
