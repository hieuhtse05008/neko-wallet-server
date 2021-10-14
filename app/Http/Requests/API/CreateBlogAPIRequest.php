<?php

namespace App\Http\Requests\API;

use App\Enum\BlogGroup;
use App\Models\Blog;
use App\Http\Requests\API\APIRequest;
use Illuminate\Validation\Rule;

/**
 * Class CreateBlogAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="Blog Create Request",
 *     @OA\Xml(
 *         name="CreateBlogAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/Blog/properties/id",
 *     ),
 * )
 */
class CreateBlogAPIRequest extends APIRequest
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
        $modelRules = Blog::$rules;
        $keyRules = [
            'image_url',
            'status',
            'type',
            'tags'
        ];
        $createRules = getDataByKeys($modelRules, $keyRules);
        $keyLocaleRules = [
            'slug',
            'title',
            'description',
            'content',
        ];
        $localeRules = getLocaleRules(getDataByKeys($modelRules, $keyLocaleRules));
        $blogGroupRule =[];
        foreach (array_keys(BlogGroup::TYPES) as $type){
            $blogGroupRule["{$type}_id"] =[
                'nullable',
                Rule::exists('blog_groups',"id")
                    ->where(function ($query) use($type){
                    return $query->where('type', $type);
                })
            ];
        }


        return array_merge($createRules, $localeRules,$blogGroupRule);
    }
}
