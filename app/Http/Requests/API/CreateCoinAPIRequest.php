<?php

namespace App\Http\Requests\API;

use App\Models\Coin;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateCoinAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Coin Create Request",
 *     @OA\Xml(
 *         name="CreateCoinAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Coin/properties/id",
 *     ),
 * )
 */
class CreateCoinAPIRequest extends APIRequest
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
        $createRules = Coin::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
