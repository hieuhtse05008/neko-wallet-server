<?php

namespace App\Http\Requests\API;

use App\Models\Contract;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateContractAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Contract Update Request",
 *     @OA\Xml(
 *         name="UpdateContractAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Contract/properties/id",
 *      ),
 * )
 */
class UpdateContractAPIRequest extends APIRequest
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
        $updateRules = Contract::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
