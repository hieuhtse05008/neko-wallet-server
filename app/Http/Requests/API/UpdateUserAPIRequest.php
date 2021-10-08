<?php

namespace App\Http\Requests\API;

use App\Models\User;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateUserAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="User Update Request",
 *     @OA\Xml(
 *         name="UpdateUserAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/User/properties/id",
 *      ),
 * )
 */
class UpdateUserAPIRequest extends APIRequest
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
        $updateRules = User::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
