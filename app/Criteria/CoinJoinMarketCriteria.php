<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CoinJoinMarketCriteria.
 *
 * @package namespace App\Criteria;
 */
class CoinJoinMarketCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->join("coin_markets_data", "coin_markets_data.coin_id", "=", "coins.coin_id");

        return $model;
    }
}
