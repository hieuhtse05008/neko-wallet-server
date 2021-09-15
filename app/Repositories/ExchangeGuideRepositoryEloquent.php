<?php

namespace App\Repositories;

use App\Models\ExchangeGuide;
use App\Repositories\Repository;
use App\Presenters\ExchangeGuidePresenter;
/**
 * Class ExchangeGuideRepositoryEloquent
 * @package App\Repositories
 * @version September 15, 2021, 4:55 am UTC
*/

class ExchangeGuideRepositoryEloquent extends Repository implements ExchangeGuideRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'url',
        'image_url',
        'coingecko_id',
        'guide_html'
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
        return ExchangeGuide::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return ExchangeGuidePresenter::class;
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
