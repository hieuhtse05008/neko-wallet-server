<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Swap
 * @package App\Models
 * @version June 25, 2021, 7:57 am UTC
 *
 *
 * @OA\Schema(
 *     title="Swap",
 *     @OA\Xml(
 *         name="Swap"
 *     ),
 *     required={"from_contract_id", "from_address", "from_value", "from_price", "from_gas_price", "from_gas_limit", "to_contract_id", "to_address", "to_value", "to_price", "to_gas_price", "to_gas_limit"},
  *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_contract_id",
 *          description="from_contract_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_address",
 *          description="from_address",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_value",
 *          description="from_value",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_price",
 *          description="from_price",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_gas_price",
 *          description="from_gas_price",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_gas_limit",
 *          description="from_gas_limit",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_contract_id",
 *          description="to_contract_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_address",
 *          description="to_address",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_value",
 *          description="to_value",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_price",
 *          description="to_price",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_gas_price",
 *          description="to_gas_price",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_gas_limit",
 *          description="to_gas_limit",
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

class Swap extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'swaps';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'from_contract_id',
        'from_address',
        'from_value',
        'from_price',
        'from_gas_price',
        'from_gas_limit',
        'to_contract_id',
        'to_address',
        'to_value',
        'to_price',
        'to_gas_price',
        'to_gas_limit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'type' => 'string',
        'from_contract_id' => 'string',
        'from_address' => 'string',
        'from_value' => 'string',
        'from_price' => 'string',
        'from_gas_price' => 'string',
        'from_gas_limit' => 'string',
        'to_contract_id' => 'string',
        'to_address' => 'string',
        'to_value' => 'string',
        'to_price' => 'string',
        'to_gas_price' => 'string',
        'to_gas_limit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'nullable|string|max:255',
        'from_contract_id' => 'required|string',
        'from_address' => 'required|string|max:255',
        'from_value' => 'required|string|max:255',
        'from_price' => 'required|string|max:255',
        'from_gas_price' => 'required|string|max:255',
        'from_gas_limit' => 'required|string|max:255',
        'to_contract_id' => 'required|string',
        'to_address' => 'required|string|max:255',
        'to_value' => 'required|string|max:255',
        'to_price' => 'required|string|max:255',
        'to_gas_price' => 'required|string|max:255',
        'to_gas_limit' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fromContract()
    {
        return $this->belongsTo(\App\Models\Contract::class, 'from_contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function toContract()
    {
        return $this->belongsTo(\App\Models\Contract::class, 'to_contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function swapOrders()
    {
        return $this->hasMany(\App\Models\SwapOrder::class, 'swap_id');
    }
}
