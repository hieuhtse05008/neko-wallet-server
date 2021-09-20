<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Token
 *
 * @package App\Models
 * @version September 2, 2021, 10:18 am UTC
 * @OA\Schema (
 *     title="Token",
 *     @OA\Xml(
 *         name="Token"
 *     ),
 *     required={"name", "symbol", "decimals", "address", "verified", "active_wallet"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="symbol",
 *          description="symbol",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="decimals",
 *          description="decimals",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="icon_url",
 *          description="icon_url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="verified",
 *          description="verified",
 *          type="boolean"
 *      )
 * ,
 *      @OA\Property(
 *          property="active_wallet",
 *          description="active_wallet",
 *          type="boolean"
 *      )
 * ,
 *      @OA\Property(
 *          property="cryptocurrency_id",
 *          description="cryptocurrency_id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="network_id",
 *          description="network_id",
 *          type="integer",
 *          format="int32"
 *      )
 * 
 * )
 * @mixin IdeHelperToken
 */

class Token extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'tokens';

    public const disabledDeletedBy = true;
    public const disabledUpdatedBy = true;
    public const disabledCreator = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'symbol',
        'decimals',
        'address',
        'icon_url',
        'verified',
        'active_wallet',
        'cryptocurrency_id',
        'network_id'
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
        'decimals' => 'integer',
        'address' => 'string',
        'icon_url' => 'string',
        'verified' => 'boolean',
        'active_wallet' => 'boolean',
        'cryptocurrency_id' => 'integer',
        'network_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'symbol' => 'required|string|max:255',
        'decimals' => 'required|integer',
        'address' => 'required|string|max:255',
        'icon_url' => 'nullable|string',
        'verified' => 'required|boolean',
        'active_wallet' => 'required|boolean',
        'cryptocurrency_id' => 'nullable',
        'network_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cryptocurrency()
    {
        return $this->belongsTo(\App\Models\Cryptocurrency::class, 'cryptocurrency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function network()
    {
        return $this->belongsTo(\App\Models\Network::class, 'network_id');
    }


    public function exchange_pairs(){
        return $this->hasMany(ExchangePair::class,'base_token_id');
    }

    public function exchange_guides(){
        return $this->belongsToMany(ExchangeGuide::class,
            'exchange_pairs',
            'target_token_id',
            'exchange_guide_id'
        );
    }
}
