<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

use Verdient\http\Request as HttpRequest;

/**
 * 请求
 * @author Verdient。
 */
class Request extends HttpRequest
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function send(): Response
    {
        return Response::fromResponse(parent::send());
    }
}
