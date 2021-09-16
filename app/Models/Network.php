<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Network
 * @package App\Models
 * @version September 2, 2021, 10:16 am UTC
 *
 *
 * @OA\Schema(
 *     title="Network",
 *     @OA\Xml(
 *         name="Network"
 *     ),
 *     required={"name", "is_active"},
  *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="chain_id",
 *          description="chain_id",
 *          type="integer",
 *          format="int32"
 *      )
,
 *      @OA\Property(
 *          property="icon_url",
 *          description="icon_url",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="short_name",
 *          description="short_name",
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
 *          property="wallet_derive_path",
 *          description="wallet_derive_path",
 *          type="string"
 *      )
,
 *      @OA\Property(
 *          property="is_active",
 *          description="is_active",
 *          type="boolean"
 *      )

 * )
 */

class Network extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'networks';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'chain_id',
        'icon_url',
        'short_name',
        'symbol',
        'wallet_derive_path',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'chain_id' => 'integer',
        'icon_url' => 'string',
        'short_name' => 'string',
        'symbol' => 'string',
        'wallet_derive_path' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'chain_id' => 'nullable|integer',
        'icon_url' => 'nullable|string',
        'short_name' => 'nullable|string|max:255',
        'symbol' => 'nullable|string|max:255',
        'wallet_derive_path' => 'nullable|string|max:255',
        'is_active' => 'required|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function networksMappings()
    {
        return $this->hasMany(\App\Models\NetworksMapping::class, 'network_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tokens()
    {
        return $this->hasMany(\App\Models\Token::class, 'network_id');
    }
}
