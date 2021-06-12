<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Token
 *
 * @package App\Models
 * @version June 12, 2021, 4:44 am UTC
 * @OA\Schema (
 *     title="Token",
 *     @OA\Xml(
 *         name="Token"
 *     ),
 *     required={"symbol", "last_price", "price_change_percent"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="symbol",
 *          description="symbol",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="last_price",
 *          description="last_price",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="price_change_percent",
 *          description="price_change_percent",
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
 * @mixin IdeHelperToken
 */

class Token extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'tokens';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];



    public $fillable = [
        'symbol',
        'last_price',
        'price_change_percent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'symbol' => 'string',
        'last_price' => 'string',
        'price_change_percent' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'symbol' => 'required|string|max:255',
        'last_price' => 'required|string|max:255',
        'price_change_percent' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
