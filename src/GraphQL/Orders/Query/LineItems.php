<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Orders\Query;

use Verdient\Shopify\GraphQL\AbstractComponent;
use Verdient\Shopify\GraphQL\Resource;
use Verdient\Shopify\GraphQL\Traits\HasList;

/**
 * 条目
 * @author Verdient。
 */
class LineItems extends AbstractComponent
{
    use HasList;

    /**
     * @var int|string 订单编号
     * @author Verdient。
     */
    protected $orderId;

    /**
     * @inheritdoc
     * @param int|string $orderId 订单编号
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($orderId, $host, $accessToken)
    {
        $this->orderId = $this->toGid($orderId);
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): Resource
    {
        return new Resource(
            'order',
            'lineItems',
            ['id' => $this->orderId],
        );
    }
}
