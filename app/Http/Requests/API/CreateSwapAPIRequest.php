<?php

namespace App\Http\Requests\API;

use App\Models\Swap;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateSwapAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Swap Create Request",
 *     @OA\Xml(
 *         name="CreateSwapAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Swap/properties/id",
 *     ),
 * )
 */
class CreateSwapAPIRequest extends APIRequest
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
        $createRules = Swap::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
