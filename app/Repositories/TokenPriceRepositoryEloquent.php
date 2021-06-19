<?php

namespace App\Repositories;

use App\Models\TokenPrice;
use App\Presenters\TokenPricePresenter;

/**
 * Class TokenPriceRepositoryEloquent
 * @package App\Repositories
 * @version June 12, 2021, 4:44 am UTC
*/

class TokenPriceRepositoryEloquent extends Repository implements TokenPriceRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'symbol',
        'last_price',
        'price_change_percent'
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
        return TokenPrice::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return TokenPricePresenter::class;
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
