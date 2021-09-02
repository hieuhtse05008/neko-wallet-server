<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\NetworkMapping;

/**
 * Class NetworkMappingTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="NetworkMapping Transformer",
 *     @OA\Xml(
 *         name="NetworkMappingTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/NetworkMapping/properties/id",
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
class NetworkMappingTransformer extends TransformerAbstract
{
    /**
     * Transform the NetworkMapping entity.
     *
     * @param \App\Models\NetworkMapping $model
     *
     * @return array
     */
    public function transform(NetworkMapping $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
