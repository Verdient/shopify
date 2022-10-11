<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\Shopify\Traits\HasList;

/**
 * 访问范围
 * @author Verdient。
 */
class AccessScope extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $routePrefix = 'admin/oauth';

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'access_scopes';
    }
}
