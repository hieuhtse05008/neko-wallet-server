<?php

namespace App\Repositories;

use App\Models\HistoricalPrice;
use App\Presenters\HistoricalPricePresenter;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\DB;

/**
 * Class HistoricalPriceRepositoryEloquent
 * @package App\Repositories
 * @version September 2, 2021, 10:09 am UTC
 */
class HistoricalPriceRepositoryEloquent extends Repository implements HistoricalPriceRepository
{
    private $cryptocurrencyRepository;

    public function __construct(Application $app, CryptocurrencyRepository $cryptocurrencyRepository)
    {
        parent::__construct($app);
        $this->cryptocurrencyRepository = $cryptocurrencyRepository;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return HistoricalPrice::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return HistoricalPricePresenter::class;
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
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function latest($limit, array $filter = [])
    {
        // TODO: Implement latest() method.
        // TODO: Implement list() method.
        $this->resetCriteria();

        $this->cryptocurrencyRepository->skipPresenter(true);
        $cryptocurrencies = $this->cryptocurrencyRepository->all(['id', 'name', 'symbol', 'icon_url']);
        $this->cryptocurrencyRepository->skipPresenter(false);


        //get latest price
        $this->scopeQuery(function ($query) use ($filter) {
            $query = $query->whereRaw("time >= NOW() - interval '3m'")
                ->groupBy('cryptocurrency_id')
                ->orderBy('cryptocurrency_id', 'asc');
            return $query;
        });

        $this->skipPresenter(true);
        $prices = $this->get(['cryptocurrency_id', DB::raw('last(price, time) AS price')])->pluck('price', 'cryptocurrency_id');
        $this->skipPresenter(false);

        //get yesterday price
        $this->scopeQuery(function ($query) use ($filter) {
            $query = $query->whereRaw("time >= NOW() - interval '1d 3m' and time <= NOW() - interval '1d'")
                ->groupBy('cryptocurrency_id')
                ->orderBy('cryptocurrency_id', 'asc');
            return $query;
        });

        $this->skipPresenter(true);
        $yesterdayPrices = $this->get(['cryptocurrency_id', DB::raw('last(price, time) AS price')])->pluck('price', 'cryptocurrency_id');
        $this->skipPresenter(false);

        $cryptocurrencies = $cryptocurrencies->map(function ($cryptocurrency) use ($prices, $yesterdayPrices) {
            $cryptocurrency->price = $prices[$cryptocurrency['id']] ?? 0;
            $cryptocurrency->percent_change_24h = 0;
            $yesterdayPrice = $yesterdayPrices[$cryptocurrency['id']] ?? 0;
            if ($cryptocurrency->price && $yesterdayPrice) {
                $cryptocurrency->percent_change_24h = round($cryptocurrency->price * 100 / $yesterdayPrice - 100, 2);
            }
            return $cryptocurrency;
        })->where('price', '>', 0)->values();

        return $cryptocurrencies;
    }
}
