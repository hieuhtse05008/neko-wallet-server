<?php

namespace App\Http\Requests\API;

use App\Models\CryptocurrencyInfo;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateCryptocurrencyInfoAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="CryptocurrencyInfo Update Request",
 *     @OA\Xml(
 *         name="UpdateCryptocurrencyInfoAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CryptocurrencyInfo/properties/id",
 *      ),
 * )
 */
class UpdateCryptocurrencyInfoAPIRequest extends APIRequest
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
        $updateRules = CryptocurrencyInfo::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
