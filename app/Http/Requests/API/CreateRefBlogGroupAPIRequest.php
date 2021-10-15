<?php

namespace App\Http\Requests\API;

use App\Models\RefBlogGroup;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateRefBlogGroupAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="RefBlogGroup Create Request",
 *     @OA\Xml(
 *         name="CreateRefBlogGroupAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/RefBlogGroup/properties/id",
 *     ),
 * )
 */
class CreateRefBlogGroupAPIRequest extends APIRequest
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
        $createRules = RefBlogGroup::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
