<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

/**
 * 变更
 * @author Verdient。
 */
class Mutation
{
    /**
     * @var string 资源名称
     * @author Verdient。
     */
    protected $name;

    /**
     * @var string 方法名称
     * @author Verdient。
     */
    protected $method;

    /**
     * @var array 参数
     * @author Verdient。
     */
    protected $params;

    /**
     * @param string $name 资源名称
     * @param string $name 资源名称
     * @param string[] $params 参数
     * @author Verdient。
     */
    public function __construct(string $name, string $method, array $params)
    {
        $this->name = $name;
        $this->method = $method;
        $this->params = $params;
    }

    /**
     * 获取资源名称
     * @author Verdient。
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 获取方法名称
     * @author Verdient。
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * 获取参数
     * @author Verdient。
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
