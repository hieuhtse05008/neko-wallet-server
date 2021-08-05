<?php

namespace App\Repositories;

use App\Models\Coin;
use App\Repositories\Repository;
use App\Presenters\CoinPresenter;
/**
 * Class CoinRepositoryEloquent
 * @package App\Repositories
 * @version August 4, 2021, 3:50 pm UTC
*/

class CoinRepositoryEloquent extends Repository implements CoinRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'coin_id',
        'symbol',
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Coin::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return CoinPresenter::class;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    static public function queryFilter($query, $filter)
    {

        return $query;
    }

    /**
     * @param int $limit
     * @param array $filter
     * @param bool $disabledRequestCriteria
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function list($limit, array $filter = [], $disabledRequestCriteria = false)
    {
        // TODO: Implement list() method.
        $this->resetCriteria();

        if (!$disabledRequestCriteria){

        }

        $this->scopeQuery(function ($query) use ($filter) {
            return $query;
        });

        if ($limit) {
            return $this->paginate($limit);
        }
        return $this->get();

    }
}
