<?php

namespace App\Http\Requests\API;

use App\Models\ExchangePair;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateExchangePairAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="ExchangePair Create Request",
 *     @OA\Xml(
 *         name="CreateExchangePairAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ExchangePair/properties/id",
 *     ),
 * )
 */
class CreateExchangePairAPIRequest extends APIRequest
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
        $createRules = ExchangePair::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
