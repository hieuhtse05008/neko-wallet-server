<?php

namespace App\Repositories;

use App\Criteria\CoinJoinMarketCriteria;
use App\Models\Coin;
use App\Presenters\CoinPresenter;
use Prettus\Repository\Criteria\RequestCriteria;

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
        if (!empty($filter['symbols'])) {
            $query = $query->whereIn('symbol', $filter['symbols']);
        }

        return $query;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    static public function queryFilterLastMarket($query, $filter)
    {

        if (!empty($filter['market_caps'])) {
            $query = $query->where(function ($q) use ($filter) {
                foreach ($filter['market_caps'] as $cap_key) {
                    $caps = array_values(array_filter(\App\Enum\Coin::MARKET_CAPS, function ($c) use ($cap_key) {
                        return $c['key'] == $cap_key;
                    }));
                    if (count($caps) > 0) {
                        $cap = $caps[0];
                        $q = $q->orWhere(function ($qq) use ($cap) {
                            if (isset($cap['low'])) {
//                                $qq = $qq->where('market_cap', '>=', $cap['low']);
                                $qq->whereRaw("(CASE WHEN market_cap = '' then null else market_cap end)::DOUBLE PRECISION >=" . $cap['low']);

                            }
                            if (isset($cap['high'])) {
//                                $qq = $qq->where('market_cap', '<=', $cap['high']);
                                $qq->whereRaw("(CASE WHEN market_cap = '' then null else market_cap end)::DOUBLE PRECISION <=" . $cap['high']);

                            }
                            return $qq;
                        });

                    }
                }
                return $q;
            });
        }

        if (!empty($filter['price_change_percentage_24h_high'])) {
            $query->whereRaw("(CASE WHEN price_change_percentage_24h = '' then null else price_change_percentage_24h end)::DOUBLE PRECISION <=" . $filter['price_change_percentage_24h_high']);

        }
        if (!empty($filter['price_change_percentage_24h_low'])) {
            $query->whereRaw("(CASE WHEN price_change_percentage_24h = '' then null else price_change_percentage_24h end)::DOUBLE PRECISION >=" . $filter['price_change_percentage_24h_low']);

        }
        if (!empty($filter['atl_change_percentage_high'])) {
            $query->whereRaw("(CASE WHEN atl_change_percentage = '' then null else atl_change_percentage end)::DOUBLE PRECISION <=" . $filter['atl_change_percentage_high']);

        }
        if (!empty($filter['atl_change_percentage_low'])) {
            $query->whereRaw("(CASE WHEN atl_change_percentage = '' then null else atl_change_percentage end)::DOUBLE PRECISION >=" . $filter['atl_change_percentage_low']);

        }

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

        if (!$disabledRequestCriteria) {
            $this->pushCriteria(app(RequestCriteria::class));

        }

        if (!empty($filter['last_market'])) {
            $this->pushCriteria(CoinJoinMarketCriteria::class);
        }
        $this->scopeQuery(function ($query) use ($filter) {
            $query = self::queryFilter($query, $filter);

            if (!empty($filter['last_market'])) {


                $query = self::queryFilterLastMarket($query, $filter['last_market']);

            }
            $query->select('coins.*');
            return $query;
        });
        if ($limit) {
            return $this->paginate($limit);
        }
        return $this->get();

    }


}
