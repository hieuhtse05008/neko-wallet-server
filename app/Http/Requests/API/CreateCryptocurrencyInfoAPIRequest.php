<?php

namespace App\Http\Requests\API;

use App\Models\CryptocurrencyInfo;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateCryptocurrencyInfoAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="CryptocurrencyInfo Create Request",
 *     @OA\Xml(
 *         name="CreateCryptocurrencyInfoAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CryptocurrencyInfo/properties/id",
 *     ),
 * )
 */
class CreateCryptocurrencyInfoAPIRequest extends APIRequest
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
        $createRules = CryptocurrencyInfo::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
