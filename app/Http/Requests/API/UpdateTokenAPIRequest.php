<?php

namespace App\Http\Requests\API;

use App\Models\TokenPrice;

/**
 * Class UpdateTokenAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="TokenPrice Update Request",
 *     @OA\Xml(
 *         name="UpdateTokenAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/TokenPrice/properties/id",
 *      ),
 * )
 */
class UpdateTokenAPIRequest extends APIRequest
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
        $updateRules = TokenPrice::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
