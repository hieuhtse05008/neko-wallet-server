<?php

namespace App\Http\Requests\API;

use App\Models\ExchangeGuide;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateExchangeGuideAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="ExchangeGuide Update Request",
 *     @OA\Xml(
 *         name="UpdateExchangeGuideAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ExchangeGuide/properties/id",
 *      ),
 * )
 */
class UpdateExchangeGuideAPIRequest extends APIRequest
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
        $updateRules = ExchangeGuide::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
