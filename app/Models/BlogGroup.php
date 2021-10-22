<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BlogGroup
 *
 * @package App\Models
 * @version October 11, 2021, 4:03 am UTC
 * @OA\Schema (
 *     title="BlogGroup",
 *     @OA\Xml(
 *         name="BlogGroup"
 *     ),
 *     required={"name", "type"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="name",
 *          description="name",
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
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
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
 * @mixin IdeHelperBlogGroup
 */

class BlogGroup extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'blog_groups';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'type' => ['required','string','max:255', 'in:'.\App\Enum\BlogGroup::TYPES_RULE],

        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function blogGroups()
    {
        return $this->hasMany(\App\Models\RefBlogGroup::class, 'blog_group_id');
    }
}
