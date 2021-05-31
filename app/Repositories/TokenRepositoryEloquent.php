<?php

namespace App\Repositories;

use App\Presenters\TokenPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TokenRepository;
use App\Models\Token;

/**
 * Class TokenRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TokenRepositoryEloquent extends BaseRepository implements TokenRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Token::class;
    }

    public function presenter()
    {
        return TokenPresenter::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
