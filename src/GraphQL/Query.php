<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

/**
 * 查询
 * @author Verdient。
 */
class Query
{
    /**
     * @var string 资源名称
     * @author Verdient。
     */
    protected $name;

    /**
     * @var string|null 字段名称
     * @author Verdient。
     */
    protected $field = null;

    /**
     * @var array 参数
     * @author Verdient。
     */
    protected $params = [];

    /**
     * @var bool 是否使用分页
     * @author Verdient。
     */
    protected $usePagination = true;

    /**
     * @param string $name 资源名称
     * @param string|null $field 字段名称
     * @param array $params 参数
     * @param bool $usePagination 是否使用分页
     * @author Verdient。
     */
    public function __construct(string $name, $field = null, array $params = [], bool $usePagination = true)
    {
        $this->name = $name;
        $this->field = $field;
        $this->params = $params;
        $this->usePagination = $usePagination;
    }

    /**
     * 获取资源名称
     * @return string
     * @author Verdient。
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 获取字段名称
     * @return string|null
     * @author Verdient。
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * 获取参数
     * @return array
     * @author Verdient。
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * 是否使用分页
     * @return bool
     * @author Verdient。
     */
    public function getUsePagination(): bool
    {
        return $this->usePagination;
    }
}
