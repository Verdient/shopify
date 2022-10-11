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
}
