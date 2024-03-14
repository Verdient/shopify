<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Traits;

use Verdient\Shopify\GraphQL\Query;
use Verdient\Shopify\Utils;

/**
 * 包含资源
 * @author Verdient。
 */
trait HasQuery
{
    /**
     * 当前资源
     * @return Query
     * @author Verdient。
     */
    abstract protected function resource(): Query;

    /**
     * 转换为GID
     * @author Verdient。
     */
    public function toGid($id): string
    {
        return Utils::toGid($this->query()->getName(), $id);
    }
}
