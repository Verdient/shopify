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
    public $routePrefix = 'admin/api/2022-07';

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
    public function request($path): Request
    {
        $request = parent::request($path . '.json');
        $request->addHeader('Content-Type', 'application/json');
        $request->addHeader('X-Shopify-Access-Token', $this->accessToken);
        $request->setTimeout(60);
        return $request;
    }

    /**
     * 当前资源名称
     * @return string
     * @author Verdient。
     */
    abstract protected function resource(): string;
}
