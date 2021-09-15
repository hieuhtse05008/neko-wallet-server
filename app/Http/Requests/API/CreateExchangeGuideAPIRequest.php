<?php

namespace App\Http\Requests\API;

use App\Models\ExchangeGuide;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateExchangeGuideAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="ExchangeGuide Create Request",
 *     @OA\Xml(
 *         name="CreateExchangeGuideAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ExchangeGuide/properties/id",
 *     ),
 * )
 */
class CreateExchangeGuideAPIRequest extends APIRequest
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
        $createRules = ExchangeGuide::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
