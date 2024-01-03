<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

/**
 * 速率限制
 * @author Verdient。
 */
class RateLimit
{
    /**
     * @var int $count 请求计数
     * @author Verdient。
     */
    protected $count = 0;

    /**
     * @var int $size 令牌桶尺寸
     * @author Verdient。
     */
    protected $size = 0;

    /**
     * @param string $header 头部内容
     * @author Verdient。
     */
    public function __construct($header)
    {
        [$this->count, $this->size] = array_map('intval', explode('/', $header));
    }

    /**
     * 获取请求计数
     * @return int
     * @author Verdient。
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * 获取令牌桶尺寸
     * @return int
     * @author Verdient。
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 获取剩余的请求数
     * @return int
     * @author Verdient。
     */
    public function residual(): int
    {
        return $this->size - $this->count;
    }

    /**
     * 获取请求数是否已耗尽
     * @return bool
     * @author Verdient。
     */
    public function isExhausted(): bool
    {
        return $this->size === $this->count;
    }
}
