<?php

namespace App\Http\Requests\API;

use App\Models\SwapOrder;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateSwapOrderAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="SwapOrder Create Request",
 *     @OA\Xml(
 *         name="CreateSwapOrderAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/SwapOrder/properties/id",
 *     ),
 * )
 */
class CreateSwapOrderAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $createRules = SwapOrder::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
