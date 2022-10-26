<?php

declare(strict_types=1);

namespace Verdient\Shopify\REST\StoreProperties;

use Verdient\Shopify\REST\AbstractComponent;
use Verdient\Shopify\REST\Traits\HasCount;
use Verdient\Shopify\REST\Traits\HasList;
use Verdient\Shopify\REST\Traits\HasOne;
use Verdient\Shopify\REST\Traits\HasUpdate;

/**
 * 省份
 * @author Verdient。
 */
class Province extends AbstractComponent
{
    use HasUpdate;
    use HasCount;
    use HasOne;
    use HasList;

    /**
     * @var int 国家编号
     * @author Verdient。
     */
    protected $countryId = null;

    /**
     * @inheritdoc
     * @param int $countryId 国家编号
     * @author Verdient。
     */
    public function __construct($countryId, $host, $accessToken)
    {
        $this->countryId = $countryId;
        parent::__construct($host, $accessToken);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'countries/' . $this->countryId . '/provinces';
    }
}
