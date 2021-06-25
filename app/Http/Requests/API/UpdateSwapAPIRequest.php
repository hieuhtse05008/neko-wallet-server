<?php

namespace App\Http\Requests\API;

use App\Models\Swap;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateSwapAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Swap Update Request",
 *     @OA\Xml(
 *         name="UpdateSwapAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Swap/properties/id",
 *      ),
 * )
 */
class UpdateSwapAPIRequest extends APIRequest
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
        $updateRules = Swap::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
