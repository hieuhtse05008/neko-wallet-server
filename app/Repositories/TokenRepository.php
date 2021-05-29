<?php

namespace App\Repositories;

use App\Models\Token;
use App\Repositories\BaseRepository;

/**
 * Class TokenRepository
 * @package App\Repositories
 * @version May 28, 2021, 9:47 am UTC
*/

class TokenRepository extends BaseRepository
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
        return Token::class;
    }
}
