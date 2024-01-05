<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL\Traits;

use Verdient\Shopify\GraphQL\Resource;

/**
 * 包含资源
 * @author Verdient。
 */
trait HasResource
{
    /**
     * 当前资源
     * @return Resource
     * @author Verdient。
     */
    abstract protected function resource(): Resource;

    /**
     * 转换为GID
     * @return string
     * @author Verdient。
     */
    public function toGid($id)
    {
        $name = $this->resource()->getName();
        if (substr((string) $id, 0, 14) !== 'gid://shopify/') {
            return 'gid://shopify/' . ucfirst($name) . '/' . $id;
        }
        return $id;
    }
}
