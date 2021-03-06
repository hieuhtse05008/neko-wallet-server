<?php

namespace App\Http\Requests\API;

use App\Models\BlogLinkGroup;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateBlogLinkGroupAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="BlogLinkGroup Create Request",
 *     @OA\Xml(
 *         name="CreateBlogLinkGroupAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/BlogLinkGroup/properties/id",
 *     ),
 * )
 */
class CreateBlogLinkGroupAPIRequest extends APIRequest
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
        $createRules = BlogLinkGroup::$rules;
        $keyRules = [];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
