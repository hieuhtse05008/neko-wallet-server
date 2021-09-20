<?php

namespace App\Transformers;

use App\Models\Token;
use League\Fractal\TransformerAbstract;

/**
 * Class TokenTransformer.
 *
 * @package namespace App\Transformers;
 *
 * @OA\Schema(
 *     title="Token Transformer",
 *     @OA\Xml(
 *         name="TokenTransformer"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Token/properties/id",
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
class TokenTransformer extends TransformerAbstract
{
    protected $availableIncludes =["network"];
    /**
     * Transform the Token entity.
     *
     * @param \App\Models\Token $model
     *
     * @return array
     */
    public function transform(Token $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'         => $model->name,
            'symbol' => $model->symbol,
            'address'         => $model->address,
            'icon_url'         => $model->icon_url,

            'created_at' => strtotime($model->created_at),
            'updated_at' => strtotime($model->updated_at),
        ];
    }

    public function includeNetwork(Token $model){
        if(!empty($model->network)){
            return $this->item($model->network, new NetworkTransformer());
        }
    }
}
