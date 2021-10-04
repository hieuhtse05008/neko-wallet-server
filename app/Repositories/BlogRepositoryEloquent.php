<?php

namespace App\Repositories;

use App\Criteria\RequestCriteria;
use App\Models\Blog;
use App\Repositories\Repository;
use App\Presenters\BlogPresenter;
/**
 * Class BlogRepositoryEloquent
 * @package App\Repositories
 * @version September 23, 2021, 8:05 am UTC
*/

class BlogRepositoryEloquent extends Repository implements BlogRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug' => 'ilike',
        'title' => 'ilike',
        'content_en' => 'ilike',
        'tags' => 'ilike',
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
        return Blog::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return BlogPresenter::class;
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

        $this->scopeQuery(function ($query) use ($filter) {
            return $query;
        });

        if ($limit) {
            return $this->paginate($limit);
        }
        return $this->get();

    }
}
