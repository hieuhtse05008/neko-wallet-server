<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\RefBlogGroup;

/**
 * Class RefBlogGroupTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="RefBlogGroup Transformer",
 *     @OA\Xml(
 *         name="RefBlogGroupTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/RefBlogGroup/properties/id",
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
class RefBlogGroupTransformer extends TransformerAbstract
{
    /**
     * Transform the RefBlogGroup entity.
     *
     * @param \App\Models\RefBlogGroup $model
     *
     * @return array
     */
    public function transform(RefBlogGroup $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
