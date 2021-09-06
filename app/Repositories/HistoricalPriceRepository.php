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
     * @return mixed
     */
    public function latest($limit, array $filter = []);
}
