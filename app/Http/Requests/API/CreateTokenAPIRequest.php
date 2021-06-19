<?php

namespace App\Http\Requests\API;

use App\Models\TokenPrice;

/**
 * Class CreateTokenAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="TokenPrice Create Request",
 *     @OA\Xml(
 *         name="CreateTokenAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/TokenPrice/properties/id",
 *     ),
 * )
 */
class CreateTokenAPIRequest extends APIRequest
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
        $createRules = TokenPrice::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
