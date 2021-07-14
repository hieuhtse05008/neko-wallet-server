<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Contract;

/**
 * Class ContractTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Contract Transformer",
 *     @OA\Xml(
 *         name="ContractTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Contract/properties/id",
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
class ContractTransformer extends TransformerAbstract
{
    /**
     * Transform the Contract entity.
     *
     * @param \App\Models\Contract $model
     *
     * @return array
     */
    public function transform(Contract $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'symbol' => $model->symbol,
            'icon_url' => $model->icon_url,
            'decimal' => (int)$model->decimal,
            'address' => $model->address,
            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }
}
