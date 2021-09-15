<?php

namespace App\Http\Requests\API;

use App\Models\Category;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateCategoryAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Category Update Request",
 *     @OA\Xml(
 *         name="UpdateCategoryAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Category/properties/id",
 *      ),
 * )
 */
class UpdateCategoryAPIRequest extends APIRequest
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
        $updateRules = Category::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
