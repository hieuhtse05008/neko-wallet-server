<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RefBlogGroup
 * @package App\Models
 * @version October 13, 2021, 4:24 am UTC
 *
 *
 * @OA\Schema(
 *     title="RefBlogGroup",
 *     @OA\Xml(
 *         name="RefBlogGroup"
 *     ),
 *     required={"blog_id", "blog_group_id"},
  *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="blog_id",
 *          description="blog_id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="blog_group_id",
 *          description="blog_group_id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      )
,
 *      @OA\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )

 * )
 */

class RefBlogGroup extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'ref_blog_group';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'blog_id',
        'blog_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'blog_id' => 'integer',
        'blog_group_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'blog_id' => 'required',
        'blog_group_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function blog()
    {
        return $this->belongsTo(\App\Models\Blog::class, 'blog_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function blogGroup()
    {
        return $this->belongsTo(\App\Models\BlogGroup::class, 'blog_group_id');
    }
}
