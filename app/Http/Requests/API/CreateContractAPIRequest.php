<?php

namespace App\Http\Requests\API;

use App\Models\Contract;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateContractAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Contract Create Request",
 *     @OA\Xml(
 *         name="CreateContractAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Contract/properties/id",
 *     ),
 * )
 */
class CreateContractAPIRequest extends APIRequest
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
        $createRules = Contract::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
