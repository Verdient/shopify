<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\Access;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCreate;
use Verdient\Shopify\REST\Traits\HasDelete;
use Verdient\Shopify\REST\Traits\HasList;

/**
 * 铺面访问秘钥
 * @author Verdient。
 */
class StorefrontAccessToken extends AbstractComponent
{
    use HasCreate;
    use HasDelete;
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'storefront_access_tokens';
    }
}
