<?php

namespace App\Http\Requests\API;

use App\Models\CoinMarketsData;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateCoinMarketsDataAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="CoinMarketsData Create Request",
 *     @OA\Xml(
 *         name="CreateCoinMarketsDataAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CoinMarketsData/properties/id",
 *     ),
 * )
 */
class CreateCoinMarketsDataAPIRequest extends APIRequest
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
        $createRules = CoinMarketsData::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
