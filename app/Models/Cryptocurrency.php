<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cryptocurrency
 * @package App\Models
 * @version September 2, 2021, 10:09 am UTC
 *
 *
 * @OA\Schema(
 *     title="Cryptocurrency",
 *     @OA\Xml(
 *         name="Cryptocurrency"
 *     ),
 *     required={"name", "symbol", "slug", "verified"},
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
 *          property="symbol",
 *          description="symbol",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="icon_url",
 *          description="icon_url",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="rank",
 *          description="rank",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="verified",
 *          description="verified",
 *          type="boolean"
 *      )

 * )
 */

class Cryptocurrency extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'cryptocurrencies';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'symbol',
        'slug',
        'icon_url',
        'rank',
        'verified'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'symbol' => 'string',
        'slug' => 'string',
        'icon_url' => 'string',
        'rank' => 'integer',
        'verified' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'symbol' => 'required|string|max:255',
        'slug' => 'required|string',
        'icon_url' => 'nullable|string',
        'rank' => 'nullable|integer',
        'verified' => 'required|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tokens()
    {
        return $this->hasMany(\App\Models\Token::class, 'cryptocurrency_id');
    }
}