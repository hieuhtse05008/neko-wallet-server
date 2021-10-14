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
 *          property="content",
 *          description="content",
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

    use HasFactory, HasTranslations;

    public $table = 'blogs';
    public $translatable  = ['slug','content', 'title', 'description'];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'slug',
        'title',
        'description',
        'image_url',
        'content',
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
        'slug' => 'array',
        'title' => 'array',
        'description' => 'array',
        'image_url' => 'string',
        'content' => 'array',
        'status' => 'string',
        'tags' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'slug' => 'required|string',
        'title' => 'required|string',
        'description' => 'required|string',
        'content' => 'required|string',
        'image_url' => 'nullable|string',
        'status' => 'nullable|string|max:255',
        'tags' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function blog_groups(){
        return $this->belongsToMany(BlogGroup::class,
            RefBlogGroup::class,
            'blog_id',
            'blog_group_id',
        );
    }
}
