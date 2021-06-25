<?php

namespace App\Transformers;

use App\Models\TokenPrice;
use League\Fractal\TransformerAbstract;

/**
 * Class TokenPriceTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="TokenPrice Transformer",
 *     @OA\Xml(
 *         name="TokenPriceTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/TokenPrice/properties/id",
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
class TokenPriceTransformer extends TransformerAbstract
{
    /**
     * Transform the TokenPrice entity.
     *
     * @param \App\Models\TokenPrice $model
     *
     * @return array
     */
    public function transform(TokenPrice $model)
    {
        return [
            'id' => (int)$model->id,
            'symbol' => $model->symbol,
            'last_price' => $model->last_price,
            'price_change_percent' => $model->price_change_percent,
            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
