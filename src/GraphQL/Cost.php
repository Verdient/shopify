<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

/**
 * 成本
 * @author Verdient。
 */
class Cost
{
    /**
     * @var int 请求的查询成本
     * @author Verdient。
     */
    protected $requestedQueryCost = 0;

    /**
     * @var int 实际的查询成本
     * @author Verdient。
     */
    protected $actualQueryCost = 0;

    /**
     * @var ThrottleStatus 限流状态
     * @author Verdient。
     */
    protected $throttleStatus = [];

    /**
     * @var array 字段的查询成本
     * @author Verdient。
     */
    protected $fields = [];

    /**
     * @param int $requestedQueryCost 请求的查询成本
     * @param int $actualQueryCost 实际的查询成本
     * @param array $throttleStatus 限流状态
     * @param array $fields 字段的查询成本
     * @author Verdient。
     */
    public function __construct(int $requestedQueryCost, int $actualQueryCost, array $throttleStatus, array $fields)
    {
        $this->requestedQueryCost = $requestedQueryCost;
        $this->actualQueryCost = $actualQueryCost;
        $this->throttleStatus = new ThrottleStatus((int) $throttleStatus['maximumAvailable'], (int) $throttleStatus['currentlyAvailable'], (int) $throttleStatus['restoreRate']);
        $this->fields = array_map(function ($value) {
            $value['field'] = implode('.', $value['path']);
            return $value;
        }, $fields);
    }

    /**
     * 获取请求的查询成本
     * @return int
     * @author Verdient。
     */
    public function getRequestedQueryCost(): int
    {
        return $this->requestedQueryCost;
    }

    /**
     * 获取实际的查询成本
     * @return int
     * @author Verdient。
     */
    public function getActualQueryCost(): int
    {
        return $this->actualQueryCost;
    }

    /**
     * 获取限流状态
     * @return ThrottleStatus
     * @author Verdient。
     */
    public function getThrottleStatus(): ThrottleStatus
    {
        return $this->throttleStatus;
    }

    /**
     * 获取字段的查询成本
     * @return array
     * @author Verdient。
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
