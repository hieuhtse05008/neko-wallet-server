<?php

namespace App\Http\Requests\API;

use App\Models\CryptocurrencyCategory;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateCryptocurrencyCategoryAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="CryptocurrencyCategory Update Request",
 *     @OA\Xml(
 *         name="UpdateCryptocurrencyCategoryAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CryptocurrencyCategory/properties/id",
 *      ),
 * )
 */
class UpdateCryptocurrencyCategoryAPIRequest extends APIRequest
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
        $updateRules = CryptocurrencyCategory::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
