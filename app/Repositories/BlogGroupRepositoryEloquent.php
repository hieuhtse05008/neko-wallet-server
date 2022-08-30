<?php

namespace App\Repositories;

use App\Criteria\RequestCriteria;
use App\Models\BlogGroup;
use App\Repositories\Repository;
use App\Presenters\BlogGroupPresenter;
/**
 * Class BlogGroupRepositoryEloquent
 * @package App\Repositories
 * @version October 11, 2021, 4:03 am UTC
*/

class BlogGroupRepositoryEloquent extends Repository implements BlogGroupRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type'
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
        return BlogGroup::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return BlogGroupPresenter::class;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    static public function queryFilter($query, $filter)
    {

        if(isset($filter['ids'])){
//            $query = $query->whereIn('blog_groups.id',$filter['ids']);
            $query = $query->where(function ($q) use($filter){
                foreach ($filter['ids'] as $id){
                    $q = $q->where('blog_groups.id','=',$id);
                }
                return $q;
            });
        }
        if(isset($filter['type']) && $filter['type']){
            $query = $query->where('blog_groups.type','=',$filter['type']);
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
            if(isset($filter['blog_group'])){
                $query = self::queryFilter($query,$filter['blog_group']);
            }
            return $query;
        });

        if ($limit) {
            return $this->paginate($limit);
        }
        return $this->get();

    }
}
