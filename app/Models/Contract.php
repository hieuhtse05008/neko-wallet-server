<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contract
 * @package App\Models
 * @version June 26, 2021, 3:17 am UTC
 *
 *
 * @OA\Schema(
 *     title="Contract",
 *     @OA\Xml(
 *         name="Contract"
 *     ),
 *     required={"network_id", "name", "symbol", "icon_url", "decimal", "address"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="network_id",
 *          description="network_id",
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
 *          property="symbol",
 *          description="symbol",
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
 *          property="decimal",
 *          description="decimal",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="address",
 *          description="address",
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
class Contract extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'contracts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'network_id',
        'name',
        'symbol',
        'icon_url',
        'decimal',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'network_id' => 'string',
        'name' => 'string',
        'symbol' => 'string',
        'icon_url' => 'string',
        'decimal' => 'integer',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'network_id' => 'required|string',
        'name' => 'required|string|max:255',
        'symbol' => 'required|string|max:255',
        'icon_url' => 'required|string|max:255',
        'decimal' => 'required|integer',
        'address' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function network()
    {
        return $this->belongsTo(\App\Models\Network::class, 'network_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function swaps()
    {
        return $this->hasMany(\App\Models\Swap::class, 'from_contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function swap1s()
    {
        return $this->hasMany(\App\Models\Swap::class, 'to_contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function swapTransactions()
    {
        return $this->hasMany(\App\Models\SwapTransaction::class, 'contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dexOrderRequests()
    {
        return $this->hasMany(\App\Models\DexOrderRequest::class, 'contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dexTransactions()
    {
        return $this->hasMany(\App\Models\DexTransaction::class, 'contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dexWithdraws()
    {
        return $this->hasMany(\App\Models\DexWithdraw::class, 'contract_id');
    }
}
