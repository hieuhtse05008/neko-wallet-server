<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Blog;

/**
 * Class BlogTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Blog Transformer",
 *     @OA\Xml(
 *         name="BlogTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Blog/properties/id",
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
class BlogTransformer extends TransformerAbstract
{
    /**
     * Transform the Blog entity.
     *
     * @param \App\Models\Blog $model
     *
     * @return array
     */
    public function transform(Blog $model)
    {
        return [
            'id'         => (int) $model->id,
            'slug' => $model->slug,
            'title' => $model->title,
            'description' => $model->description,
            'image_url' => $model->image_url,
            'content_en' => $model->content_en,
            'status' => $model->status,
            'type' => $model->type,
            'tags' => $model->tags,
            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
