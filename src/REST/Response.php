<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST;

use Verdient\http\Response as HttpResponse;
use Verdient\HttpAPI\AbstractResponse;
use Verdient\HttpAPI\Result;

/**
 * 响应
 * @author Verdient。
 */
class Response extends AbstractResponse
{
    /**
     * @var RateLimit|null 速率限制
     * @author Verdient。
     */
    protected $rateLimit = null;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function __construct(HttpResponse $response)
    {
        parent::__construct($response);
        $headers = array_change_key_case($response->getHeaders(), CASE_LOWER);
        if (isset($headers['x-shopify-shop-api-call-limit'])) {
            $this->rateLimit = new RateLimit($headers['x-shopify-shop-api-call-limit']);
        }
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function normailze(HttpResponse $response): Result
    {
        $result = new Result;
        $statusCode = $response->getStatusCode();
        $result->isOK = $statusCode >= 200 && $statusCode < 300;
        $result->data = $response->getBody();
        if (!$result->isOK) {
            $result->errorCode = $statusCode;
            $result->errorMessage = isset($result->data['errors']) ? json_encode($result->data['errors']) : $response->getStatusMessage();
        }
        return $result;
    }

    /**
     * 获取速率限制
     * @return RateLimit|null
     * @author Verdient。
     */
    public function getRateLimit()
    {
        return $this->rateLimit;
    }
}
