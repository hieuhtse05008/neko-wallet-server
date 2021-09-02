<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
/**
 * Interface CoinRepository.
 *
 * @package namespace App\Repositories;
 */
interface HistoricalPriceRepository extends RepositoryInterface
{
    /**
     * @param int $limit
     * @param array $filter
     * @param bool $disabledRequestCriteria
     * @return mixed
     */
    public function lastest($limit, array $filter = [], $disabledRequestCriteria = false);
}
