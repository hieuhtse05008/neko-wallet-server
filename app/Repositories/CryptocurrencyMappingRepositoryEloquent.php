<?php

namespace App\Repositories;

use App\Models\CryptocurrencyMapping;
use App\Repositories\Repository;
use App\Presenters\CryptocurrencyMappingPresenter;
/**
 * Class CryptocurrencyMappingRepositoryEloquent
 * @package App\Repositories
 * @version September 2, 2021, 10:14 am UTC
*/

class CryptocurrencyMappingRepositoryEloquent extends Repository implements CryptocurrencyMappingRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cryptocurrency_id',
        'coingecko_id',
        'cmc_id',
        'binance_id'
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
        return CryptocurrencyMapping::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return CryptocurrencyMappingPresenter::class;
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
