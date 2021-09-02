<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\HistoricalPrice;

/**
 * Class HistoricalPriceTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="HistoricalPrice Transformer",
 *     @OA\Xml(
 *         name="HistoricalPriceTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/HistoricalPrice/properties/id",
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
class HistoricalPriceTransformer extends TransformerAbstract
{
    /**
     * Transform the HistoricalPrice entity.
     *
     * @param \App\Models\HistoricalPrice $model
     *
     * @return array
     */
    public function transform(HistoricalPrice $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
