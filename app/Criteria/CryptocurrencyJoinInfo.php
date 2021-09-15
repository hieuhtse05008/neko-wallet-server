<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CryptocurrencyJoinInfo.
 *
 * @package namespace App\Criteria;
 */
class CryptocurrencyJoinInfo implements CriteriaInterface
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
        $model = $model->join('cryptocurrency_info','cryptocurrencies.id','=','cryptocurrency_info.cryptocurrency_id');

        return $model;
    }
}
