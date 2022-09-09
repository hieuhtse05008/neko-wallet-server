<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ContactRequest
 * @package App\Models
 * @version September 9, 2022, 5:40 am UTC
 *
 *
 * @OA\Schema(
 *     title="ContactRequest",
 *     @OA\Xml(
 *         name="ContactRequest"
 *     ),
 *     required={"name", "company", "email", "content"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="company",
 *          description="company",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="content",
 *          description="content",
 *          type="string"
 *      )

 * )
 */

class ContactRequest extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contact_request';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'company',
        'email',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'company' => 'string',
        'email' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'email' => 'required|string||email|max:255',
        'content' => 'required|string'
    ];
}
