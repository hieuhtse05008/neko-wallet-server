<?php

namespace App\Repositories;

use App\Models\SwapOrder;
use App\Repositories\Repository;
use App\Presenters\SwapOrderPresenter;
/**
 * Class SwapOrderRepositoryEloquent
 * @package App\Repositories
 * @version June 26, 2021, 3:18 am UTC
*/

class SwapOrderRepositoryEloquent extends Repository implements SwapOrderRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'fee',
        'current_step',
        'swap_id',
        'from_swap_transaction_id',
        'from_dex_order_request_id',
        'to_swap_transaction_id',
        'to_dex_order_request_id'
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
        return SwapOrder::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return SwapOrderPresenter::class;
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
