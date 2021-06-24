<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TokenPriceRepository.
 *
 * @package namespace App\Repositories;
 */
interface TokenPriceRepository extends RepositoryInterface
{
    /**
     * @param int $limit
     * @param array $filter
     * @param bool $disabledRequestCriteria
     * @return mixed
     */
    public function list($limit, array $filter = [], $disabledRequestCriteria = false);

    public function swapPreview($from, $to, $bridge = 'USDT');
}
