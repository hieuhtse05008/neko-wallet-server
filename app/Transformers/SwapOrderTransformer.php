<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\SwapOrder;

/**
 * Class SwapOrderTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="SwapOrder Transformer",
 *     @OA\Xml(
 *         name="SwapOrderTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/SwapOrder/properties/id",
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
class SwapOrderTransformer extends TransformerAbstract
{
    /**
     * Transform the SwapOrder entity.
     *
     * @param \App\Models\SwapOrder $model
     *
     * @return array
     */
    public function transform(SwapOrder $model)
    {
        return [
            'id' => (int)$model->id,
            'status' => $model->status,
            'current_step' => (int)$model->current_step,
            'fee' => $model->fee,
            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
