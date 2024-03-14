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
     * @var string 输入实体
     * @author Verdient。
     */
    protected $inputEntity;

    /**
     * @param string $name 资源名称
     * @param string $method 方法名称
     * @param array $inputEntity 输入实体
     * @author Verdient。
     */
    public function __construct(string $name, string $method, string $inputEntity)
    {
        $this->name = $name;
        $this->method = $method;
        $this->inputEntity = $inputEntity;
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
     * 获取输入实体
     * @author Verdient。
     */
    public function getInputEntity(): string
    {
        return $this->inputEntity;
    }
}
