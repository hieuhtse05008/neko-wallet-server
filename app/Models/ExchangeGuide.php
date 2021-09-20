<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ExchangeGuide
 *
 * @package App\Models
 * @version September 15, 2021, 4:55 am UTC
 * @OA\Schema (
 *     title="ExchangeGuide",
 *     @OA\Xml(
 *         name="ExchangeGuide"
 *     ),
 *     required={""},
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
 *          property="description",
 *          description="description",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="url",
 *          description="url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="image_url",
 *          description="image_url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="coingecko_id",
 *          description="coingecko_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="guide_html",
 *          description="guide_html",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      )
 * ,
 *      @OA\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * 
 * )
 * @mixin IdeHelperExchangeGuide
 */

class ExchangeGuide extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'exchange_guides';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'url',
        'image_url',
        'coingecko_id',
        'guide_html'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'url' => 'string',
        'image_url' => 'string',
        'coingecko_id' => 'string',
        'guide_html' => 'object'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'url' => 'nullable|string|max:255',
        'image_url' => 'nullable|string|max:255',
        'coingecko_id' => 'nullable|string|max:255',
        'guide_html' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function exchangePairs()
    {
        return $this->hasMany(\App\Models\ExchangePair::class, 'exchange_guide_id');
    }
}
