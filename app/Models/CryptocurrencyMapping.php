<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CryptocurrencyMapping
 * @package App\Models
 * @version September 2, 2021, 10:14 am UTC
 *
 *
 * @OA\Schema(
 *     title="CryptocurrencyMapping",
 *     @OA\Xml(
 *         name="CryptocurrencyMapping"
 *     ),
 *     required={"cryptocurrency_id"},
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
 *          property="coingecko_id",
 *          description="coingecko_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="cmc_id",
 *          description="cmc_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="binance_id",
 *          description="binance_id",
 *          type="string"
 *      )

 * )
 */

class CryptocurrencyMapping extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'cryptocurrencies_mapping';

//    const CREATED_AT = 'created_at';
//    const UPDATED_AT = 'updated_at';

//    protected $dates = ['deleted_at'];



    public $fillable = [
        'cryptocurrency_id',
        'coingecko_id',
        'cmc_id',
        'binance_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cryptocurrency_id' => 'integer',
        'coingecko_id' => 'string',
        'cmc_id' => 'string',
        'binance_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cryptocurrency_id' => 'required',
        'coingecko_id' => 'nullable|string|max:255',
        'cmc_id' => 'nullable|string|max:255',
        'binance_id' => 'nullable|string|max:255'
    ];


}
