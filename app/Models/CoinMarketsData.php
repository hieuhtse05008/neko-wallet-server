<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CoinMarketsData
 * @package App\Models
 * @version August 4, 2021, 3:36 pm UTC
 *
 *
 * @OA\Schema(
 *     title="CoinMarketsData",
 *     @OA\Xml(
 *         name="CoinMarketsData"
 *     ),
 *     required={"coin_id", "current_price", "market_cap", "total_volume", "price_change_24h", "price_change_percentage_24h"},
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
 *          property="current_price",
 *          description="current_price",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="market_cap",
 *          description="market_cap",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="total_volume",
 *          description="total_volume",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="price_change_24h",
 *          description="price_change_24h",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="price_change_percentage_24h",
 *          description="price_change_percentage_24h",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="last_updated",
 *          description="last_updated",
 *          type="string",
 *          format="date-time"
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
,
 *      @OA\Property(
 *          property="circulating_supply",
 *          description="circulating_supply",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="total_supply",
 *          description="total_supply",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="max_supply",
 *          description="max_supply",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="market_cap_rank",
 *          description="market_cap_rank",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="fully_diluted_valuation",
 *          description="fully_diluted_valuation",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="high_24h",
 *          description="high_24h",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="ath",
 *          description="ath",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="ath_change_percentage",
 *          description="ath_change_percentage",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="ath_date",
 *          description="ath_date",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="low_24h",
 *          description="low_24h",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="atl",
 *          description="atl",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="atl_change_percentage",
 *          description="atl_change_percentage",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="atl_date",
 *          description="atl_date",
 *          type="string"
 *      )

 * )
 */

class CoinMarketsData extends Model
{

    use HasFactory;

    public $table = 'coin_markets_data';
    public $connection = 'warehouse';
    public const disabledDeletedBy = true;
    public const disabledUpdatedBy = true;
    public const disabledCreator = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'coin_id',
        'current_price',
        'market_cap',
        'total_volume',
        'price_change_24h',
        'price_change_percentage_24h',
        'last_updated',
        'circulating_supply',
        'total_supply',
        'max_supply',
        'market_cap_rank',
        'fully_diluted_valuation',
        'high_24h',
        'ath',
        'ath_change_percentage',
        'ath_date',
        'low_24h',
        'atl',
        'atl_change_percentage',
        'atl_date',
        'price_change_percentage_1h_in_currency',
        'price_change_percentage_7d_in_currency',
        'price_change_percentage_30d_in_currency',
        'price_change_percentage_1y_in_currency',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'coin_id' => 'string',
        'current_price' => 'string',
        'market_cap' => 'string',
        'total_volume' => 'string',
        'price_change_24h' => 'string',
        'price_change_percentage_24h' => 'string',
        'last_updated' => 'datetime',
        'circulating_supply' => 'string',
        'total_supply' => 'string',
        'max_supply' => 'string',
        'market_cap_rank' => 'string',
        'fully_diluted_valuation' => 'string',
        'high_24h' => 'string',
        'ath' => 'string',
        'ath_change_percentage' => 'string',
        'ath_date' => 'string',
        'low_24h' => 'string',
        'atl' => 'string',
        'atl_change_percentage' => 'string',
        'atl_date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'coin_id' => 'required|string',
        'current_price' => 'required|string',
        'market_cap' => 'required|string',
        'total_volume' => 'required|string',
        'price_change_24h' => 'required|string',
        'price_change_percentage_24h' => 'required|string',
        'last_updated' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'circulating_supply' => 'nullable|string',
        'total_supply' => 'nullable|string',
        'max_supply' => 'nullable|string',
        'market_cap_rank' => 'nullable|string',
        'fully_diluted_valuation' => 'nullable|string',
        'high_24h' => 'nullable|string',
        'ath' => 'nullable|string',
        'ath_change_percentage' => 'nullable|string',
        'ath_date' => 'nullable|string',
        'low_24h' => 'nullable|string',
        'atl' => 'nullable|string',
        'atl_change_percentage' => 'nullable|string',
        'atl_date' => 'nullable|string'
    ];
    public function coin(){
        return $this->belongsTo(Coin::class,'coin_id','coin_id');
    }
}
