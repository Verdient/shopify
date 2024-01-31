<?php

declare(strict_types=1);

namespace Verdient\Shopify;

/**
 * 工具
 * @author Verdient。
 */
class Utils
{
    /**
     * 将ID转换为GID
     * @param string $resource 资源名称
     * @param int|string $id 编号
     * @return string
     * @author Verdient。
     */
    public static function toGid(string $resource, $id): string
    {
        if (substr((string) $id, 0, 14) !== 'gid://shopify/') {
            return 'gid://shopify/' . ucfirst($resource) . '/' . $id;
        }
        return $id;
    }

    /**
     * 将GID转换为ID
     * @param string $gid 编号
     * @return int|null
     * @author Verdient。
     */
    public static function toId(string $gid)
    {
        $idParts = explode('/', $gid);
        if (empty($idParts)) {
            return null;
        }
        $id = array_pop($idParts);
        $pos = strpos($id, '?');
        if ($pos !== false) {
            $id = substr($id, 0, $pos);
        }
        return (int) $id;
    }
}
