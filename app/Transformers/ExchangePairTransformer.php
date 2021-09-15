<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ExchangePair;

/**
 * Class ExchangePairTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="ExchangePair Transformer",
 *     @OA\Xml(
 *         name="ExchangePairTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ExchangePair/properties/id",
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
class ExchangePairTransformer extends TransformerAbstract
{
    /**
     * Transform the ExchangePair entity.
     *
     * @param \App\Models\ExchangePair $model
     *
     * @return array
     */
    public function transform(ExchangePair $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
