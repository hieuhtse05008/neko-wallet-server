<?php

namespace App\Repositories;

use App\Criteria\RequestCriteria;
use App\Models\CryptocurrencyCategory;
use App\Repositories\Repository;
use App\Presenters\CryptocurrencyCategoryPresenter;
/**
 * Class CryptocurrencyCategoryRepositoryEloquent
 * @package App\Repositories
 * @version September 18, 2021, 8:32 am UTC
*/

class CryptocurrencyCategoryRepositoryEloquent extends Repository implements CryptocurrencyCategoryRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cryptocurrency_id',
        'category_id'
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
        return CryptocurrencyCategory::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return CryptocurrencyCategoryPresenter::class;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    static public function queryFilter($query, $filter)
    {
        if(!empty($filter['category_ids']) && !in_array(null,$filter['category_ids'] )){
            $query = $query->whereIn('category_id',$filter['category_ids']);
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

        if (!$disabledRequestCriteria){
            $this->pushCriteria(app(RequestCriteria::class));

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
