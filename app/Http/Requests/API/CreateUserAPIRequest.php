<?php

namespace App\Http\Requests\API;

use App\Models\User;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateUserAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="User Create Request",
 *     @OA\Xml(
 *         name="CreateUserAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/User/properties/id",
 *     ),
 * )
 */
class CreateUserAPIRequest extends APIRequest
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
        $createRules = User::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
