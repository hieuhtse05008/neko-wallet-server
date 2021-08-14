<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CoinJoinLastMarketCriteria.
 *
 * @package namespace App\Criteria;
 */
class CoinJoinLastMarketCriteria implements CriteriaInterface
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
        $model = $model->join("last_coin_markets_data", "last_coin_markets_data.coin_id", "=", "coins.coin_id");

        return $model;
    }
}
