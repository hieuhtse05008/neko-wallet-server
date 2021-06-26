<?php

namespace App\Http\Requests\API;

use App\Models\SwapOrder;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateSwapOrderAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="SwapOrder Update Request",
 *     @OA\Xml(
 *         name="UpdateSwapOrderAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/SwapOrder/properties/id",
 *      ),
 * )
 */
class UpdateSwapOrderAPIRequest extends APIRequest
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
        $updateRules = SwapOrder::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
