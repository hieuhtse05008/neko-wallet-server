<?php

namespace App\Repositories;

use App\Models\CoinMarketsData;
use App\Repositories\Repository;
use App\Presenters\CoinMarketsDataPresenter;
/**
 * Class CoinMarketsDataRepositoryEloquent
 * @package App\Repositories
 * @version August 4, 2021, 3:36 pm UTC
*/

class CoinMarketsDataRepositoryEloquent extends Repository implements CoinMarketsDataRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'coin_id',
        'current_price',
        'market_cap',
        'total_volume',
        'price_change_24h',
        'price_change_percentage_24h',
        'last_updated',
        'circulating_supply',
        'total_supply',
        'max_supply',
        'market_cap_rank',
        'fully_diluted_valuation',
        'high_24h',
        'ath',
        'ath_change_percentage',
        'ath_date',
        'low_24h',
        'atl',
        'atl_change_percentage',
        'atl_date'
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
        return CoinMarketsData::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return CoinMarketsDataPresenter::class;
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
