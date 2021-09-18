<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\CryptocurrencyCategory;

/**
 * Class CryptocurrencyCategoryTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="CryptocurrencyCategory Transformer",
 *     @OA\Xml(
 *         name="CryptocurrencyCategoryTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CryptocurrencyCategory/properties/id",
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
class CryptocurrencyCategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['cryptocurrencies','categories'];
    /**
     * Transform the CryptocurrencyCategory entity.
     *
     * @param \App\Models\CryptocurrencyCategory $model
     *
     * @return array
     */
    public function transform(CryptocurrencyCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
