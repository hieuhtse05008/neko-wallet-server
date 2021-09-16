<?php

namespace App\Repositories;

use App\Criteria\CryptocurrencyJoinInfo;
use App\Criteria\RequestCriteria;
use App\Models\Cryptocurrency;
use App\Repositories\Repository;
use App\Presenters\CryptocurrencyPresenter;
/**
 * Class CryptocurrencyRepositoryEloquent
 * @package App\Repositories
 * @version September 2, 2021, 10:09 am UTC
*/

class CryptocurrencyRepositoryEloquent extends Repository implements CryptocurrencyRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' =>'ilike',
        'symbol' =>'ilike',
        'slug' =>'ilike',
//        'icon_url',
//        'rank',
//        'verified'
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
        return Cryptocurrency::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return CryptocurrencyPresenter::class;
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
            $this->pushCriteria(app(RequestCriteria::class));

        }

        if(!empty($filter['cryptocurrency_info'])){
            $this->pushCriteria(CryptocurrencyJoinInfo::class);
        }

        $this->scopeQuery(function ($query) use ($filter) {
            if(!empty($filter['from_rank'])){
                $query = $query->where('rank','>=',$filter['from_rank']);
            }
            return $query->select('cryptocurrencies.*');
        });

        if ($limit) {
            return $this->paginate($limit);
        }
        return $this->get();

    }
}
