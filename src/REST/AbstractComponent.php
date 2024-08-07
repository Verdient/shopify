<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

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
     * @var string 代理地址
     * @author Verdient。
     */
    protected $proxyHost = null;

    /**
     * @var int 代理端口
     * @author Verdient。
     */
    protected $proxyPort = null;

    /**
     * @var string|null 版本号
     * @author Verdient。
     */
    public $version = '2024-07';

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
     * 设置代理
     * @param string $host 地址
     * @param int $port 端口
     * @return static
     * @author Verdient。
     */
    public function setProxy($host, $port)
    {
        $this->proxyHost = $host;
        $this->proxyPort = $port;
        return $this;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function request($path): Request
    {
        $request = parent::request($path . '.json');
        $request->addHeader('Content-Type', 'application/json');
        $request->addHeader('X-Shopify-Access-Token', $this->accessToken);
        $request->setTimeout(60);
        if ($this->proxyHost) {
            $request->setProxy($this->proxyHost, $this->proxyPort);
        }
        return $request;
    }

    /**
     * 当前资源名称
     * @return string
     * @author Verdient。
     */
    abstract protected function resource(): string;
}
