<?php

namespace App\Repositories;

use App\Models\CryptocurrencyInfo;
use App\Repositories\Repository;
use App\Presenters\CryptocurrencyInfoPresenter;
/**
 * Class CryptocurrencyInfoRepositoryEloquent
 * @package App\Repositories
 * @version September 15, 2021, 4:33 am UTC
*/

class CryptocurrencyInfoRepositoryEloquent extends Repository implements CryptocurrencyInfoRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cryptocurrency_id',
        'description',
        'links'
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
        return CryptocurrencyInfo::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return CryptocurrencyInfoPresenter::class;
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
