<?php

namespace App\Transformers;

use Illuminate\Support\Facades\Log;
use League\Fractal\TransformerAbstract;
use App\Models\Coin;

/**
 * Class CoinTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Coin Transformer",
 *     @OA\Xml(
 *         name="CoinTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Coin/properties/id",
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
class CoinTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['markets','last_market'];
    /**
     * Transform the Coin entity.
     *
     * @param \App\Models\Coin $model
     *
     * @return array
     */
    public function transform(Coin $model)
    {
        return [
            'id'         => (int) $model->id,
            'coin_id'=>$model->coin_id,
            'symbol'=>$model->symbol,
            'name'=>$model->name,
            'coin_market_cap_id'=>$model->coin_market_cap_id,
            'holder_count'=>$model->holder_count,
            'asset_platform_id'=>$model->asset_platform_id,
            'platforms'=>$model->platforms,
            'categories'=>$model->categories,
            'image_url'=>$model->image_url,

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }

    public function includeMarkets(Coin $model){
        if($model->markets){
            return $this->collection($model->markets, new CoinMarketsDataTransformer());
        }
    }
    public function includeLastMarket(Coin $model){
        if($model->last_market){
            $item = $this->item($model->last_market, new CoinMarketsDataTransformer());
//            dd($item);
            return $item;
        }
    }
}
