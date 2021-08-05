<?php

namespace App\Http\Requests\API;

use App\Models\CoinMarketsData;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateCoinMarketsDataAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="CoinMarketsData Update Request",
 *     @OA\Xml(
 *         name="UpdateCoinMarketsDataAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/CoinMarketsData/properties/id",
 *      ),
 * )
 */
class UpdateCoinMarketsDataAPIRequest extends APIRequest
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
        $updateRules = CoinMarketsData::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
