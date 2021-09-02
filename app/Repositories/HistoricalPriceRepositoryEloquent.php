<?php

namespace App\Repositories;

use App\Repositories\HistoricalPriceRepository;
use App\Models\HistoricalPrice;
use App\Validators\HistoricalPriceValidator;

/**
 * Class HistoricalPriceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HistoricalPriceRepositoryEloquent extends BaseRepository implements HistoricalPriceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HistoricalPrice::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {

    }

    /**
     * @param int $limit
     * @param array $filter
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function list($limit, array $filter = [], $disabledRequestCriteria = false)
    {
        // TODO: Implement list() method.
        $this->resetCriteria();

        $this->scopeQuery(function ($query) use ($filter) {
            return $query;
        });

        if ($limit) {
            return $this->paginate($limit);
        }

        return $this->get();

    }

}
