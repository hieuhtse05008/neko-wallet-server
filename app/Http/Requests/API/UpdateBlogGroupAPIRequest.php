<?php

namespace App\Http\Requests\API;

use App\Models\BlogGroup;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateBlogGroupAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="BlogGroup Update Request",
 *     @OA\Xml(
 *         name="UpdateBlogGroupAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/BlogGroup/properties/id",
 *      ),
 * )
 */
class UpdateBlogGroupAPIRequest extends APIRequest
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
        $updateRules = BlogGroup::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
