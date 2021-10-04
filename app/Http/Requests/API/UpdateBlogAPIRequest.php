<?php

namespace App\Http\Requests\API;

use App\Models\Blog;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateBlogAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Blog Update Request",
 *     @OA\Xml(
 *         name="UpdateBlogAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Blog/properties/id",
 *      ),
 * )
 */
class UpdateBlogAPIRequest extends APIRequest
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
        $updateRules = Blog::$rules;
        $keyRules = [
            'slug',
            'title',
            'description',
            'image_url',
            'content_en',
            'status',
            'type',
            'tags'
        ];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
