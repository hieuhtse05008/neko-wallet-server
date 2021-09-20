<?php

namespace App\Transformers;

use App\Models\Cryptocurrency;
use League\Fractal\TransformerAbstract;

/**
 * Class CryptocurrencyTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Cryptocurrency Transformer",
 *     @OA\Xml(
 *         name="CryptocurrencyTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Cryptocurrency/properties/id",
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
class CryptocurrencyTransformer extends TransformerAbstract
{
    protected $availableIncludes = ["cryptocurrency_info","categories","tokens"];
    /**
     * Transform the Cryptocurrency entity.
     *
     * @param \App\Models\Cryptocurrency $model
     *
     * @return array
     */
    public function transform(Cryptocurrency $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'symbol' => $model->symbol,
            'slug' => $model->slug,
            'icon_url' => $model->icon_url,
            'rank' => $model->rank,
        ];
    }

    public function includeCryptocurrencyInfo(Cryptocurrency $model){
        if(!empty($model->cryptocurrency_info)){
            return $this->item($model->cryptocurrency_info, new CryptocurrencyInfoTransformer());
        }
    }
    public function includeCategories(Cryptocurrency $model){
        if(!empty($model->categories)){
            return $this->collection($model->categories, new CategoryTransformer());
        }
    }

    public function includeTokens(Cryptocurrency $model){
        if(!empty($model->tokens)){
            return $this->collection($model->tokens, new TokenTransformer());
        }
    }

}
