<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\CryptocurrencyInfo;

/**
 * Class CryptocurrencyInfoTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="CryptocurrencyInfo Transformer",
 *     @OA\Xml(
 *         name="CryptocurrencyInfoTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CryptocurrencyInfo/properties/id",
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
class CryptocurrencyInfoTransformer extends TransformerAbstract
{
    /**
     * Transform the CryptocurrencyInfo entity.
     *
     * @param \App\Models\CryptocurrencyInfo $model
     *
     * @return array
     */
    public function transform(CryptocurrencyInfo $model)
    {
        return [
            'id'         => (int) $model->id,
            'description'         => $model->description,
            'links' => $model->links,



            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
