<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Swap;

/**
 * Class SwapTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Swap Transformer",
 *     @OA\Xml(
 *         name="SwapTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Swap/properties/id",
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
class SwapTransformer extends TransformerAbstract
{
    /**
     * Transform the Swap entity.
     *
     * @param \App\Models\Swap $model
     *
     * @return array
     */
    public function transform(Swap $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
