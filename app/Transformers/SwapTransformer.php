<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Swap;

/**
 * Class SwapTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Swap Transformer",
 *     @OA\Xml(
 *         name="SwapTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Swap/properties/id",
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
class SwapTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['from_contract', 'to_contract', 'swap_orders'];

    /**
     * Transform the Swap entity.
     *
     * @param \App\Models\Swap $model
     *
     * @return array
     */
    public function transform(Swap $model)
    {
        return [
            'id' => (int)$model->id,
            'from_address' => $model->from_address,
            'from_value' => $model->from_value,
            'from_price' => $model->from_price,
            'to_address' => $model->to_address,
            'to_value' => $model->to_value,
            'to_price' => $model->to_price,
            /* place your other model properties here */

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }

    public function includeFromContract(Swap $model)
    {
        if ($model->fromContract) {
            return $this->item($model->fromContract, new ContractTransformer());
        }

        return null;
    }

    public function includeToContract(Swap $model)
    {
        if ($model->toContract) {
            return $this->item($model->toContract, new ContractTransformer());
        }

        return null;
    }

    public function includeSwapOrders(Swap $model)
    {
        return $this->collection($model->swapOrders, new SwapOrderTransformer());
    }
}
