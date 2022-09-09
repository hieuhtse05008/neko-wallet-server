<?php

namespace App\Repositories;

use App\Models\ContactRequest;
use App\Repositories\Repository;
use App\Presenters\ContactRequestPresenter;

/**
 * Class ContactRequestRepositoryEloquent
 * @package App\Repositories
 * @version September 9, 2022, 5:40 am UTC
 */

class ContactRequestRepositoryEloquent extends Repository implements ContactRequestRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'company',
        'email',
        'content'
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
        return ContactRequest::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return ContactRequestPresenter::class;
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

        if (!$disabledRequestCriteria) {
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
