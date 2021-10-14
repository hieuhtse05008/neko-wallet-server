<?php

namespace App\Http\Requests\API;

use App\Models\BlogLinkGroup;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateBlogLinkGroupAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="BlogLinkGroup Update Request",
 *     @OA\Xml(
 *         name="UpdateBlogLinkGroupAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/BlogLinkGroup/properties/id",
 *      ),
 * )
 */
class UpdateBlogLinkGroupAPIRequest extends APIRequest
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
        $updateRules = BlogLinkGroup::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
