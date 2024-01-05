<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

use Verdient\HttpAPI\AbstractClient;

/**
 * 抽象组件
 * @author Verdient。
 */
abstract class AbstractComponent extends AbstractClient
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $protocol = 'https';

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $routePrefix = 'admin/api';

    /**
     * @var string 授权秘钥
     * @author Verdient。
     */
    protected $accessToken = null;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $request = Request::class;

    /**
     * @var string|null 版本号
     * @author Verdient。
     */
    public $version = '2023-10';

    /**
     * @inheritdoc
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($host, $accessToken)
    {
        $this->host = $host;
        $this->accessToken = $accessToken;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function getRequestPath(): string
    {
        if ($this->version) {
            return parent::getRequestPath() . '/' . $this->version;
        }
        return parent::getRequestPath();
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function request($path = null): Request
    {
        if ($path) {
            $path .= '/graphql.json';
        } else {
            $path = 'graphql.json';
        }
        $request = parent::request($path);
        $request->setMethod('POST');
        $request->addHeader('Content-Type', 'application/graphql');
        $request->addHeader('X-Shopify-Access-Token', $this->accessToken);
        $request->addHeader('X-GraphQL-Cost-Include-Fields', 'true');
        $request->setTimeout(60);
        $request->setProxy('10.1.1.102', 7890);
        return $request;
    }
}
