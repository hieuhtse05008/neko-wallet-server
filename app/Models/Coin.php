<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Coin
 * @package App\Models
 * @version August 4, 2021, 3:50 pm UTC
 *
 *
 * @OA\Schema(
 *     title="Coin",
 *     @OA\Xml(
 *         name="Coin"
 *     ),
 *     required={"coin_id", "symbol", "name"},
  *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="coin_id",
 *          description="coin_id",
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
 *          property="name",
 *          description="name",
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

class Coin extends Model
{

    use HasFactory;

    public $table = 'coins';
    public $connection = 'warehouse';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public const disabledDeletedBy = true;
    public const disabledUpdatedBy = true;
    public const disabledCreator = true;



    public $fillable = [
        'coin_id',
        'symbol',
        'holder_count',
        'asset_platform_id',
        'platforms',
        'categories',
        'coin_market_cap_id',
        'symbol',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'coin_id' => 'string',
        'symbol' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'coin_id' => 'required|string',
        'symbol' => 'required|string',
        'name' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];



    public function markets(){
        return $this->hasMany(CoinMarketsData::class, 'coin_id','coin_id');
    }

    public function last_market(){
        return $this->hasOne(LastCoinMarketsData::class, 'coin_id','coin_id');

    }
}
