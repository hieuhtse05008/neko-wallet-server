<?php

namespace App\Transformers;

use App\Models\Network;
use League\Fractal\TransformerAbstract;

/**
 * Class NetworkTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Network Transformer",
 *     @OA\Xml(
 *         name="NetworkTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Network/properties/id",
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
class NetworkTransformer extends TransformerAbstract
{
    /**
     * Transform the Network entity.
     *
     * @param \App\Models\Network $model
     *
     * @return array
     */
    public function transform(Network $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'short_name' => $model->short_name,
            'icon_url' => $model->icon_url,
            'symbol' => $model->symbol,


            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
