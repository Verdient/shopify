<?php

declare(strict_types=1);

namespace Verdient\Shopify\GraphQL;

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
     * @var Cost|null 成本
     * @author Verdient。
     */
    protected $cost = null;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function __construct() {}

    /**
     * 通过结果创建
     * @param Result $result 结果
     * @param Response $response 响应对象
     * @return static
     * @author Verdient。
     */
    public static function fromResult(Result $result, Response $response)
    {
        $res = new static();
        $res->response = $response->getResponse();
        $res->cost = $response->getCost();
        $res->isOK = $result->isOK;
        $res->data = $result->data;
        $res->errorCode = $result->errorCode;
        $res->errorMessage = $result->errorMessage;
        return $res;
    }

    /**
     * 通过响应创建
     * @param HttpResponse $response 响应对象
     * @return static
     * @author Verdient。
     */
    public static function fromResponse(HttpResponse $response)
    {
        $res = new static();
        $res->response = $response;
        $result = $res->normailze($response);
        $res->isOK = $result->isOK;
        $res->data = $result->data;
        $res->errorCode = $result->errorCode;
        $res->errorMessage = $result->errorMessage;
        if ($result->isOK) {
            $resData = $response->getBody();
            $costData = $resData['extensions']['cost'];
            $res->cost = new Cost(
                $costData['requestedQueryCost'],
                $costData['actualQueryCost'],
                $costData['throttleStatus'],
                $costData['fields'],
            );
        }
        return $res;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function normailze(HttpResponse $response): Result
    {
        $result = new Result;

        $body = $response->getBody();

        if (!is_array($body)) {
            $result->isOK = false;
            $result->errorCode = $response->getStatusCode();
            $result->errorMessage = (string) $body;
            return $result;
        }

        $result->isOK = array_key_exists('data', $body) && empty($body['errors']);

        if ($result->isOK) {
            $result->data = $this->normailzeData($body['data']);
        } else {
            $result->errorCode = null;
            if (!empty($body['errors'])) {
                if (is_scalar($body['errors'])) {
                    $result->errorMessage = $body['errors'];
                } else if (is_array($body['errors'])) {
                    $errors = [];
                    foreach ($body['errors'] as $error) {
                        if (is_scalar($error)) {
                            $errors[] = $error;
                        } else if (is_array($error) && isset($error['message'])) {
                            $errors[] = $error['message'];
                        } else {
                            $errors[] = json_encode($error);
                        }
                    }
                    if (count($errors) > 1) {
                        $result->errorMessage = json_encode($errors);
                    } else {
                        $result->errorMessage = $errors[0] ?? json_encode($body['errors']);
                    }
                } else {
                    $result->errorMessage = json_encode($body['errors']);
                }
            } else {
                $result->errorMessage = $response->getStatusMessage();
            }
        }

        return $result;
    }

    /**
     * 格式化数据
     * @param array $data 数据
     * @return array
     * @author Verdient。
     */
    protected function normailzeData(array $data): array
    {
        $result = [];

        foreach ($data as $name => $value) {
            if (is_array($value)) {
                $result[$name] = $this->normailzeData($value);
            } else {
                if (is_string($value)) {
                    if (substr($value, 0, 14) === 'gid://shopify/') {
                        $idParts = explode('/', $value);
                        $id = array_pop($idParts);
                        $pos = strpos($id, '?');
                        if ($pos !== false) {
                            $id = substr($id, 0, $pos);
                        }
                        if ($name === 'id') {
                            $result[$name] = $id;
                            $result['gid'] = $value;
                        } else {
                            $result[$name] = $id;
                            if (substr($name, -2) === 'Id') {
                                $result[substr($name, 0, -2) . 'Gid'] = $value;
                            } else {
                                $result[$name . 'Gid'] = $value;
                            }
                        }
                    } else {
                        $result[$name] = $value;
                    }
                } else {
                    $result[$name] = $value;
                }
            }
        }
        return $result;
    }

    /**
     * 获取成本
     * @return Cost|null
     * @author Verdient。
     */
    public function getCost()
    {
        return $this->cost;
    }
}
