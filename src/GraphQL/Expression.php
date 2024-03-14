<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

/**
 * 表达式
 * @author Verdient。
 */
class Expression
{
    /**
     * @var string $value 内容
     * @author Verdient。
     */
    protected $value;

    /**
     * @param string $value 内容
     * @author Verdient。
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function __toString(): string
    {
        return (string) $this->value;
    }
}
