<?php

namespace App\Repositories;

use App\Models\ExchangePair;
use App\Repositories\Repository;
use App\Presenters\ExchangePairPresenter;
/**
 * Class ExchangePairRepositoryEloquent
 * @package App\Repositories
 * @version September 15, 2021, 4:56 am UTC
*/

class ExchangePairRepositoryEloquent extends Repository implements ExchangePairRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'trade_url',
        'base_token_id',
        'target_token_id',
        'exchange_guide_id'
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
        return ExchangePair::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return ExchangePairPresenter::class;
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
