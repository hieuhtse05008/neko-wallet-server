<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Token
 * @package App\Models
 * @version May 28, 2021, 9:47 am UTC
 *
 * @property string $symbol
 * @property string $last_price
 * @property string $price_change_percent
 */
class Token extends Model
{


    public $table = 'tokens';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'symbol',
        'last_price',
        'price_change_percent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'symbol' => 'string',
        'last_price' => 'string',
        'price_change_percent' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'symbol' => 'required|string|max:255',
        'last_price' => 'required|string|max:255',
        'price_change_percent' => 'required|string|max:255'
    ];

    
}
