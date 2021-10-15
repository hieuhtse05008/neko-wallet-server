<?php

namespace App\Repositories;

use App\Models\RefBlogGroup;
use App\Repositories\Repository;
use App\Presenters\RefBlogGroupPresenter;
/**
 * Class RefBlogGroupRepositoryEloquent
 * @package App\Repositories
 * @version October 13, 2021, 4:24 am UTC
*/

class RefBlogGroupRepositoryEloquent extends Repository implements RefBlogGroupRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'blog_id',
        'blog_group_id'
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
        return RefBlogGroup::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return RefBlogGroupPresenter::class;
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
