<?php

namespace App\Http\Requests\API;

use App\Models\Category;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateCategoryAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Category Create Request",
 *     @OA\Xml(
 *         name="CreateCategoryAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Category/properties/id",
 *     ),
 * )
 */
class CreateCategoryAPIRequest extends APIRequest
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
        $createRules = Category::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
