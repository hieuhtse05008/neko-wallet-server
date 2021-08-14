<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\CoinMarketsData;

/**
 * Class CoinMarketsDataTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="CoinMarketsData Transformer",
 *     @OA\Xml(
 *         name="CoinMarketsDataTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CoinMarketsData/properties/id",
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="Created at",
 *          type="integer",
 *          format="int32",
 *          example=1575041693,
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="Updated at",
 *          type="integer",
 *          format="int32",
 *          example=1575041693,
 *      ),
 * )
 */
class CoinMarketsDataTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['coin'];
    /**
     * Transform the CoinMarketsData entity.
     *
     * @param \App\Models\CoinMarketsData $model
     *
     * @return array
     */
    public function transform(CoinMarketsData $model)
    {
        return [
            'id'         => (int) $model->id,
            'coin_id'=>$model->coin_id,
            'current_price'=>(string)$model->current_price,
            'market_cap'=>(string)$model->market_cap,
            'total_volume'=>(string)$model->total_volume,
            'price_change_24h'=>(string)$model->price_change_24h,
            'price_change_percentage_24h'=>(string)$model->price_change_percentage_24h,
            'circulating_supply'=>(string)$model->circulating_supply,
            'total_supply'=>(string)$model->total_supply,
            'max_supply'=>(string)$model->max_supply,
            'market_cap_rank'=>(string)$model->market_cap_rank,
            'fully_diluted_valuation'=>(string)$model->fully_diluted_valuation,
            'high_24h'=>(string)$model->high_24h,
            'ath'=>(string)$model->ath,
            'ath_change_percentage'=>(string)$model->ath_change_percentage,
            'low_24h'=>(string)$model->low_24h,
            'atl'=>(string)$model->atl,
            'atl_change_percentage'=>(string)$model->atl_change_percentage,
            /* place your other model properties here */

            'ath_date' => strtotime($model->ath_date),
            'atl_date' => strtotime($model->atl_date),
            'last_updated' => strtotime($model->last_updated),
            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
    public function includeCoin(CoinMarketsData $model){
        if($model->coin){
            return $this->item($model->coin,new CoinTransformer());
        }
    }
}
