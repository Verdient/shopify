<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

/**
 * 查询
 * @author Verdient。
 */
class Objects
{
    /**
     * @var string 名称
     * @author Verdient。
     */
    protected $name;

    /**
     * @var array 内容
     * @author Verdient。
     */
    protected $contents;

    /**
     * @var array|null 参数
     * @author Verdient。
     */
    protected $params = null;

    /**
     * @param string $name 名称
     * @param array $contents 内容
     * @param array $params 参数
     * @author Verdient。
     */
    public function __construct(string $name, array $contents, $params = null)
    {
        $this->name = $name;
        $this->contents = $contents;
        $this->params = $params;
    }

    /**
     * 获取名称
     * @return string
     * @author Verdient。
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 获取内容
     * @return array
     * @author Verdient。
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * 获取参数
     * @return array
     * @author Verdient。
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function __toString()
    {
        $str = '';
        foreach ($this->contents as $content) {
            if (is_scalar($content)) {
                $contentStr = '    ' . (string) $content;
            } else {
                $contentStr = implode(PHP_EOL, array_map(function ($value) {
                    return '    ' . $value;
                }, explode(PHP_EOL, (string) $content)));
            }
            $str .= $contentStr . PHP_EOL;
        }
        $name = $this->name;
        if (!empty($this->params)) {
            $paramsStr = '';
            foreach ($this->params as $paramName => $paramValue) {
                if (is_string($paramValue)) {
                    $paramValue = '"' . $paramValue . '"';
                }
                if (is_bool($paramValue)) {
                    $paramValue = $paramValue ? 'true' : 'false';
                }
                $paramsStr .= ', ' . $paramName . ': ' . $paramValue;
            }
            $paramsStr = substr($paramsStr, 2);
            $name .= '(' . $paramsStr . ')';
        }
        if (substr($str, -1) === PHP_EOL) {
            return $name . ' {' . PHP_EOL . $str . '}';
        } else {
            return $name . ' {' . PHP_EOL . $str . PHP_EOL . '}';
        }
    }

    /**
     * 将数组转换为对象
     * @param array $array 待转换的数组
     * @return array
     * @author Verdient。
     */
    public static function toObjects(array $array): array
    {
        $result = [];
        foreach ($array as $name => $value) {
            if ($name === '__params__') {
                continue;
            }
            if (is_array($value)) {
                $result[$name] = new static($name, static::toObjects($value), $value['__params__'] ?? null);
            } else {
                $result[$name] = $value;
            }
        }
        return $result;
    }

    /**
     * 将数组转换为查询字符串
     * @param array $array 待转换的数组
     * @return array
     * @author Verdient。
     */
    public static function toQuery(array $array)
    {
        $objects = static::toObjects($array);
        return (string) reset($objects);
    }
}
