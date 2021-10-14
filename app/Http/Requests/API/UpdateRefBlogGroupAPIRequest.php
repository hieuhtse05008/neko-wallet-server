<?php

namespace App\Http\Requests\API;

use App\Models\RefBlogGroup;
use App\Http\Requests\API\APIRequest;

/**
 * Class UpdateRefBlogGroupAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="RefBlogGroup Update Request",
 *     @OA\Xml(
 *         name="UpdateRefBlogGroupAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/RefBlogGroup/properties/id",
 *      ),
 * )
 */
class UpdateRefBlogGroupAPIRequest extends APIRequest
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
        $updateRules = RefBlogGroup::$rules;
        $keyRules = [];
        $updateRules = getDataByKeys($updateRules, $keyRules);
        return $updateRules;
    }
}
