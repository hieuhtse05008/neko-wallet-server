<?php

namespace App\Repositories;

use App\Models\Contract;
use App\Repositories\Repository;
use App\Presenters\ContractPresenter;
/**
 * Class ContractRepositoryEloquent
 * @package App\Repositories
 * @version June 26, 2021, 3:17 am UTC
*/

class ContractRepositoryEloquent extends Repository implements ContractRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'network_id',
        'name',
        'symbol',
        'icon_url',
        'decimal',
        'address'
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
        return Contract::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return ContractPresenter::class;
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
