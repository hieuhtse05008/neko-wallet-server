<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ContactRequest;

/**
 * Class ContactRequestTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="ContactRequest Transformer",
 *     @OA\Xml(
 *         name="ContactRequestTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ContactRequest/properties/id",
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
class ContactRequestTransformer extends TransformerAbstract
{
    /**
     * Transform the ContactRequest entity.
     *
     * @param \App\Models\ContactRequest $model
     *
     * @return array
     */
    public function transform(ContactRequest $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'company'    => $model->company,
            'email'      => $model->email,
            'content'    => $model->content,
            'created_at' => strtotime($model->created_at),
        ];
    }
}
