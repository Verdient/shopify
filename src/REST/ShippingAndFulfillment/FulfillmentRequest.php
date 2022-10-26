<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\ShippingAndFulfillment;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Response;
use Verdient\Shopify\REST\Traits\HasCreate;

/**
 * 履约请求
 * @author Verdient。
 */
class FulfillmentRequest extends AbstractComponent
{
    use HasCreate;

    /**
     * @var int 履约单编号
     * @author Verdient。
     */
    protected $fulfillmentOrderId = null;

    /**
     * @inheritdoc
     * @param int $fulfillmentOrderId 履约单编号
     * @author Verdient。
     */
    public function __construct($fulfillmentOrderId, $host, $accessToken)
    {
        $this->fulfillmentOrderId = $fulfillmentOrderId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'fulfillment_orders/' . $this->fulfillmentOrderId . '/fulfillment_request';
    }

    /**
     * 接受
     * @return Response
     * @author Verdient。
     */
    public function accept(): Response
    {
        return $this
            ->request($this->resource() . '/accept')
            ->setMethod('POST')
            ->send();
    }

    /**
     * 拒绝
     * @return Response
     * @author Verdient。
     */
    public function reject(): Response
    {
        return $this
            ->request($this->resource() . '/reject')
            ->setMethod('POST')
            ->send();
    }
}
