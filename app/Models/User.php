<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Class User
 *
 * @package App\Models
 * @version October 6, 2021, 8:34 am UTC
 * @OA\Schema (
 *     title="User",
 *     @OA\Xml(
 *         name="User"
 *     ),
 *     required={"name", "email", "username", "password"},
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
 *          property="email",
 *          description="email",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="username",
 *          description="username",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="avatar_url",
 *          description="avatar_url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="dob",
 *          description="dob",
 *          type="string",
 *          format="date-time"
 *      )
 * ,
 *      @OA\Property(
 *          property="gender",
 *          description="gender",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="remember_token",
 *          description="remember_token",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
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
 * @mixin IdeHelperUser
 */

class User extends Authenticatable
{

    use HasApiTokens,SoftDeletes, HasFactory;



    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $fillable = [
        'name',
        'email',
        'username',
        'avatar_url',
        'phone',
        'dob',
        'gender'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'username' => 'string',
        'password' => 'string',
        'avatar_url' => 'string',
        'phone' => 'string',
        'dob' => 'datetime',
        'gender' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'avatar_url' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'dob' => 'nullable',
        'gender' => 'nullable|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
