<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ExchangePair
 * @package App\Models
 * @version September 15, 2021, 4:56 am UTC
 *
 *
 * @OA\Schema(
 *     title="ExchangePair",
 *     @OA\Xml(
 *         name="ExchangePair"
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
 *          property="trade_url",
 *          description="trade_url",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="base_token_id",
 *          description="base_token_id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="target_token_id",
 *          description="target_token_id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="exchange_guide_id",
 *          description="exchange_guide_id",
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

class ExchangePair extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'exchange_pairs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'trade_url',
        'base_token_id',
        'target_token_id',
        'exchange_guide_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trade_url' => 'string',
        'base_token_id' => 'integer',
        'target_token_id' => 'integer',
        'exchange_guide_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trade_url' => 'nullable|string',
        'base_token_id' => 'nullable',
        'target_token_id' => 'nullable',
        'exchange_guide_id' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function baseToken()
    {
        return $this->belongsTo(\App\Models\Token::class, 'base_token_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function targetToken()
    {
        return $this->belongsTo(\App\Models\Token::class, 'target_token_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function exchangeGuide()
    {
        return $this->belongsTo(\App\Models\ExchangeGuide::class, 'exchange_guide_id');
    }
}
