<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\BlogGroup;

/**
 * Class BlogGroupTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="BlogGroup Transformer",
 *     @OA\Xml(
 *         name="BlogGroupTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/BlogGroup/properties/id",
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
class BlogGroupTransformer extends TransformerAbstract
{
    /**
     * Transform the BlogGroup entity.
     *
     * @param \App\Models\BlogGroup $model
     *
     * @return array
     */
    public function transform(BlogGroup $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'         => $model->name,
            'type'         => $model->type,

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
