<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\CryptocurrencyMapping;

/**
 * Class CryptocurrencyMappingTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="CryptocurrencyMapping Transformer",
 *     @OA\Xml(
 *         name="CryptocurrencyMappingTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CryptocurrencyMapping/properties/id",
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
class CryptocurrencyMappingTransformer extends TransformerAbstract
{
    /**
     * Transform the CryptocurrencyMapping entity.
     *
     * @param \App\Models\CryptocurrencyMapping $model
     *
     * @return array
     */
    public function transform(CryptocurrencyMapping $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
