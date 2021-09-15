<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ExchangeGuide;

/**
 * Class ExchangeGuideTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="ExchangeGuide Transformer",
 *     @OA\Xml(
 *         name="ExchangeGuideTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ExchangeGuide/properties/id",
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
class ExchangeGuideTransformer extends TransformerAbstract
{
    /**
     * Transform the ExchangeGuide entity.
     *
     * @param \App\Models\ExchangeGuide $model
     *
     * @return array
     */
    public function transform(ExchangeGuide $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
