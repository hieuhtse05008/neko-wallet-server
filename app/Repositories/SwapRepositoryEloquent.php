<?php

namespace App\Repositories;

use App\Models\Swap;
use App\Repositories\Repository;
use App\Presenters\SwapPresenter;
/**
 * Class SwapRepositoryEloquent
 * @package App\Repositories
 * @version June 25, 2021, 7:57 am UTC
*/

class SwapRepositoryEloquent extends Repository implements SwapRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'from_contract_id',
        'from_address',
        'from_value',
        'from_price',
        'from_gas_price',
        'from_gas_limit',
        'to_contract_id',
        'to_address',
        'to_value',
        'to_price',
        'to_gas_price',
        'to_gas_limit'
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
        return Swap::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return SwapPresenter::class;
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
