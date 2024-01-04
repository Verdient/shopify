<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

/**
 * 限流状态
 * @author Verdient。
 */
class ThrottleStatus
{
    /**
     * @var int 最大可用
     * @author Verdient。
     */
    protected $maximumAvailable = 0;

    /**
     * @var int 当前可用
     * @author Verdient。
     */
    protected $currentlyAvailable = 0;

    /**
     * @var int 每秒的恢复速率
     * @author Verdient。
     */
    protected $restoreRate = 0;

    /**
     * @param int $maximumAvailable 最大可用
     * @param int $currentlyAvailable 当前可用
     * @param array $restoreRate 每秒的恢复速率
     * @author Verdient。
     */
    public function __construct(int $maximumAvailable, int $currentlyAvailable, int $restoreRate)
    {
        $this->maximumAvailable = $maximumAvailable;
        $this->currentlyAvailable = $currentlyAvailable;
        $this->restoreRate = $restoreRate;
    }

    /**
     * 获取最大可用
     * @return int
     * @author Verdient。
     */
    public function getMaximumAvailable(): int
    {
        return $this->maximumAvailable;
    }

    /**
     * 获取当前可用
     * @return int
     * @author Verdient。
     */
    public function getCurrentlyAvailable(): int
    {
        return $this->currentlyAvailable;
    }

    /**
     * 获取每秒的恢复速率
     * @return int
     * @author Verdient。
     */
    public function getRestoreRate(): int
    {
        return $this->restoreRate;
    }
}
