<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel query()
 * @mixin \Eloquent
 * @mixin IdeHelperBaseModel
 */
	class IdeHelperBaseModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PersonalAccessToken
 *
 * @mixin IdeHelperPersonalAccessToken
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $tokenable
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken query()
 */
	class IdeHelperPersonalAccessToken extends \Eloquent {}
}

namespace App\Models{
/**
 * Class TokenPrice
 *
 * @package App\Models
 * @version June 12, 2021, 4:44 am UTC
 * @OA\Schema (
 *     title="TokenPrice",
 *     @OA\Xml(
 *         name="TokenPrice"
 *     ),
 *     required={"symbol", "last_price", "price_change_percent"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="symbol",
 *          description="symbol",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="last_price",
 *          description="last_price",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="price_change_percent",
 *          description="price_change_percent",
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
 * @mixin IdeHelperToken
 * @method static \Database\Factories\TokenFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice query()
 */
	class IdeHelperToken extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @mixin IdeHelperUser
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class IdeHelperUser extends \Eloquent {}
}

