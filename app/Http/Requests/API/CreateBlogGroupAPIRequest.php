<?php

namespace App\Http\Requests\API;

use App\Models\BlogGroup;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateBlogGroupAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="BlogGroup Create Request",
 *     @OA\Xml(
 *         name="CreateBlogGroupAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/BlogGroup/properties/id",
 *     ),
 * )
 */
class CreateBlogGroupAPIRequest extends APIRequest
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
        $createRules = BlogGroup::$rules;
        $keyRules = [
            'name',
            'type',
        ];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
