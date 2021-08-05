<?php

namespace App\Http\Requests\API;

use App\Models\Coin;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateCoinAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Coin Update Request",
 *     @OA\Xml(
 *         name="UpdateCoinAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Coin/properties/id",
 *      ),
 * )
 */
class UpdateCoinAPIRequest extends APIRequest
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
        $updateRules = Coin::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
