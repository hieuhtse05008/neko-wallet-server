<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Blog
 *
 * @package App\Models
 * @version September 23, 2021, 8:05 am UTC
 * @OA\Schema (
 *     title="Blog",
 *     @OA\Xml(
 *         name="Blog"
 *     ),
 *     required={"title", "tags"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="image_url",
 *          description="image_url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="content_en",
 *          description="content_en",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="tags",
 *          description="tags",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      )
 * ,
 *      @OA\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * 
 * )
 * @mixin IdeHelperBlog
 */

class Blog extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'blogs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'slug',
        'title',
        'description',
        'image_url',
        'content_en',
        'status',
        'type',
        'tags'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'slug' => 'string',
        'title' => 'string',
        'description' => 'string',
        'image_url' => 'string',
        'content_en' => 'string',
        'status' => 'string',
        'type' => 'string',
        'tags' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'slug' => 'nullable|string',
        'title' => 'required|string',
        'description' => 'required|string',
        'image_url' => 'nullable|string',
        'content_en' => 'nullable|string',
        'status' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:255',
        'tags' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
