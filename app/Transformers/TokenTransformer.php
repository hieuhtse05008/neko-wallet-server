<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Token;

/**
 * Class TokenTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Token Transformer",
 *     @OA\Xml(
 *         name="TokenTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Token/properties/id",
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
class TokenTransformer extends TransformerAbstract
{
    /**
     * Transform the Token entity.
     *
     * @param \App\Models\Token $model
     *
     * @return array
     */
    public function transform(Token $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
