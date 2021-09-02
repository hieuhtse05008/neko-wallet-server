<?php

namespace App\Repositories;

use App\Models\Network;
use App\Repositories\Repository;
use App\Presenters\NetworkPresenter;
/**
 * Class NetworkRepositoryEloquent
 * @package App\Repositories
 * @version September 2, 2021, 10:16 am UTC
*/

class NetworkRepositoryEloquent extends Repository implements NetworkRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'chain_id',
        'icon_url',
        'short_name',
        'symbol',
        'wallet_derive_path',
        'is_active'
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
        return Network::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return NetworkPresenter::class;
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
