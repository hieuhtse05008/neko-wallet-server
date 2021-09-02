<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoricalPrice
 * @package App\Models
 * @version September 2, 2021, 9:38 am UTC
 *
 *
 * @OA\Schema(
 *     title="HistoricalPrice",
 *     @OA\Xml(
 *         name="HistoricalPrice"
 *     ),
 *     required={""},
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
class HistoricalPrice extends Model
{
    use HasFactory;

    protected $connection = 'timescale_price';

    public $table = 'historical_prices';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    public $fillable = [
        'cryptocurrency_id',
        'price',
        'volume_24h',
        'market_cap',
        'time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cryptocurrency_id' => 'integer',
        'price' => 'double',
        'volume_24h' => 'double',
        'market_cap' => 'double',
        'time' => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
