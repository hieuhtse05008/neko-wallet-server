<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CryptocurrencyInfo
 * @package App\Models
 * @version September 15, 2021, 4:33 am UTC
 *
 *
 * @OA\Schema(
 *     title="CryptocurrencyInfo",
 *     @OA\Xml(
 *         name="CryptocurrencyInfo"
 *     ),
 *     required={""},
  *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="cryptocurrency_id",
 *          description="cryptocurrency_id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="links",
 *          description="links",
 *          type="string"
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

class CryptocurrencyInfo extends Model
{

    use HasFactory;

    public $table = 'cryptocurrency_info';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = [];



    public $fillable = [
        'cryptocurrency_id',
        'description',
        'links'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cryptocurrency_id' => 'integer',
        'description' => 'string',
        'links' => 'object'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cryptocurrency_id' => 'nullable',
        'description' => 'nullable|string',
        'links' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cryptocurrency()
    {
        return $this->belongsTo(\App\Models\Cryptocurrency::class, 'cryptocurrency_id');
    }
}
