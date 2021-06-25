<?php

namespace App\Repositories;

use App\Models\TokenPrice;
use App\Presenters\TokenPricePresenter;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;

/**
 * Class TokenPriceRepositoryEloquent
 * @package App\Repositories
 * @version June 12, 2021, 4:44 am UTC
*/

class TokenPriceRepositoryEloquent extends Repository implements TokenPriceRepository
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
        return TokenPrice::class;
    }

    /**
     * @return string|null
     */
    public function presenter()
    {
        return TokenPricePresenter::class;
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

    /**
     * @param $from
     * @param $to
     * @param string $bridge
     * @return array
     */
    public function swapPreview($from, $to, $bridge = 'USDT'): ?array
    {
        $pair1 = $from . $bridge;
        $pair2 = $to . $bridge;
        $pair3 = $from . $to;

        //preg_match("/\b$bridge/g", );

        $token_price_from = $this->findWhere(['symbol' => $pair1]);
        $token_price_to =
            array_merge(
                $this->findWhere(['symbol' => $pair2]),
                $this->findWhere(['symbol' => $pair3])
            )
        ;

        if(empty($token_price_from) || empty($token_price_to)) return null;

        $res = [
            'price' => 0,
            'from_symbol' => null,
            'to_symbol' => null,
            'from_price' => null,
            'to_price' => null,
        ];

        foreach ($token_price_from as $token_from)
            foreach ($token_price_to as $token_to) {

                $price_from = floatval($token_from['last_price'])*0.99;
                $price_to = floatval($token_to['last_price'])*1.01;
                $price = $price_from/$price_to;

                if ($price> $res['price']) {
                    $res = [
                        'price' => $price,
                        'from_symbol' => $token_from['symbol'],
                        'to_symbol' => $token_to['symbol'],
                        'from_price' => $price_from,
                        'to_price' => $price_to,
                    ];
                }


            }
        return $res;
    }

}
