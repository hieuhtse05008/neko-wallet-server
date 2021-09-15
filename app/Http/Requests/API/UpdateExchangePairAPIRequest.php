<?php

namespace App\Http\Requests\API;

use App\Models\ExchangePair;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateExchangePairAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="ExchangePair Update Request",
 *     @OA\Xml(
 *         name="UpdateExchangePairAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ExchangePair/properties/id",
 *      ),
 * )
 */
class UpdateExchangePairAPIRequest extends APIRequest
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
        $updateRules = ExchangePair::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
