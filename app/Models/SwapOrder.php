<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SwapOrder
 * @package App\Models
 * @version June 26, 2021, 3:18 am UTC
 *
 *
 * @OA\Schema(
 *     title="SwapOrder",
 *     @OA\Xml(
 *         name="SwapOrder"
 *     ),
 *     required={"status", "fee", "current_step", "swap_id"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="fee",
 *          description="fee",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="current_step",
 *          description="current_step",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="swap_id",
 *          description="swap_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_swap_transaction_id",
 *          description="from_swap_transaction_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="from_dex_order_request_id",
 *          description="from_dex_order_request_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_swap_transaction_id",
 *          description="to_swap_transaction_id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="to_dex_order_request_id",
 *          description="to_dex_order_request_id",
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
class SwapOrder extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'swap_orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'fee',
        'current_step',
        'swap_id',
        'from_swap_transaction_id',
        'from_dex_order_request_id',
        'to_swap_transaction_id',
        'to_dex_order_request_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'status' => 'string',
        'fee' => 'string',
        'current_step' => 'string',
        'swap_id' => 'string',
        'from_swap_transaction_id' => 'string',
        'from_dex_order_request_id' => 'string',
        'to_swap_transaction_id' => 'string',
        'to_dex_order_request_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required|string|max:255',
        'fee' => 'required|string|max:255',
        'current_step' => 'required|string|max:255',
        'swap_id' => 'required|string',
        'from_swap_transaction_id' => 'nullable|string',
        'from_dex_order_request_id' => 'nullable|string',
        'to_swap_transaction_id' => 'nullable|string',
        'to_dex_order_request_id' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function swap()
    {
        return $this->belongsTo(\App\Models\Swap::class, 'swap_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fromSwapTransaction()
    {
        return $this->belongsTo(\App\Models\SwapTransaction::class, 'from_swap_transaction_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fromDexOrderRequest()
    {
        return $this->belongsTo(\App\Models\DexOrderRequest::class, 'from_dex_order_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function toSwapTransaction()
    {
        return $this->belongsTo(\App\Models\SwapTransaction::class, 'to_swap_transaction_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function toDexOrderRequest()
    {
        return $this->belongsTo(\App\Models\DexOrderRequest::class, 'to_dex_order_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dexWithdraws()
    {
        return $this->hasMany(\App\Models\DexWithdraw::class, 'swap_order_id');
    }
}
