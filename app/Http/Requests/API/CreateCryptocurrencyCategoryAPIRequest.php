<?php

namespace App\Http\Requests\API;

use App\Models\CryptocurrencyCategory;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateCryptocurrencyCategoryAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="CryptocurrencyCategory Create Request",
 *     @OA\Xml(
 *         name="CreateCryptocurrencyCategoryAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CryptocurrencyCategory/properties/id",
 *     ),
 * )
 */
class CreateCryptocurrencyCategoryAPIRequest extends APIRequest
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
        $createRules = CryptocurrencyCategory::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
