<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CryptocurrencyJoinCryptocurrencyCategory.
 *
 * @package namespace App\Criteria;
 */
class CryptocurrencyJoinCryptocurrencyCategory implements CriteriaInterface
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
        $model = $model->join('cryptocurrency_category','cryptocurrencies.id','=','cryptocurrency_category.cryptocurrency_id');

        return $model;
    }
}
