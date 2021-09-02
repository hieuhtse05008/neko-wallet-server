<?php

namespace App\Repositories;

use App\Models\Token;
use App\Repositories\Repository;
use App\Presenters\TokenPresenter;
/**
 * Class TokenRepositoryEloquent
 * @package App\Repositories
 * @version September 2, 2021, 10:18 am UTC
*/

class TokenRepositoryEloquent extends Repository implements TokenRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'symbol',
        'decimals',
        'address',
        'icon_url',
        'verified',
        'active_wallet',
        'cryptocurrency_id',
        'network_id'
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
        return Token::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return TokenPresenter::class;
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
