<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Cryptocurrency;

/**
 * Class CryptocurrencyTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Cryptocurrency Transformer",
 *     @OA\Xml(
 *         name="CryptocurrencyTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Cryptocurrency/properties/id",
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
class CryptocurrencyTransformer extends TransformerAbstract
{
    /**
     * Transform the Cryptocurrency entity.
     *
     * @param \App\Models\Cryptocurrency $model
     *
     * @return array
     */
    public function transform(Cryptocurrency $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
