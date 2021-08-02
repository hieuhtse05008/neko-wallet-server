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
 * Class Contract
 *
 * @package App\Models
 * @version June 26, 2021, 3:17 am UTC
 * @OA\Schema (
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
 * ,
 *      @OA\Property(
 *          property="network_id",
 *          description="network_id",
 *          type="string"
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
 *          property="icon_url",
 *          description="icon_url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="decimal",
 *          description="decimal",
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
 * )
 * @property string $id
 * @property string $network_id
 * @property string $name
 * @property string $symbol
 * @property string $icon_url
 * @property int $decimal
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Swap[] $swap1s
 * @property-read int|null $swap1s_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Swap[] $swaps
 * @property-read int|null $swaps_count
 * @method static \Database\Factories\ContractFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereDecimal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereNetworkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperContract extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PersonalAccessToken
 *
 * @mixin IdeHelperPersonalAccessToken
 * @property int $id
 * @property string $tokenable_type
 * @property int $tokenable_id
 * @property string $name
 * @property string $token
 * @property array|null $abilities
 * @property \Illuminate\Support\Carbon|null $last_used_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $tokenable
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereUpdatedAt($value)
 */
	class IdeHelperPersonalAccessToken extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Swap
 *
 * @package App\Models
 * @version June 25, 2021, 7:57 am UTC
 * @OA\Schema (
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
 * ,
 *      @OA\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_contract_id",
 *          description="from_contract_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_address",
 *          description="from_address",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_value",
 *          description="from_value",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_price",
 *          description="from_price",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_gas_price",
 *          description="from_gas_price",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_gas_limit",
 *          description="from_gas_limit",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_contract_id",
 *          description="to_contract_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_address",
 *          description="to_address",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_value",
 *          description="to_value",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_price",
 *          description="to_price",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_gas_price",
 *          description="to_gas_price",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_gas_limit",
 *          description="to_gas_limit",
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
 * @property string $id
 * @property string|null $type
 * @property string $from_contract_id
 * @property string $from_address
 * @property string $from_value
 * @property string $from_price
 * @property string $from_gas_price
 * @property string $from_gas_limit
 * @property string $to_contract_id
 * @property string $to_address
 * @property string $to_value
 * @property string $to_price
 * @property string $to_gas_price
 * @property string $to_gas_limit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Contract $fromContract
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SwapOrder[] $swapOrders
 * @property-read int|null $swap_orders_count
 * @property-read \App\Models\Contract $toContract
 * @method static \Database\Factories\SwapFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Swap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Swap query()
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereFromAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereFromContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereFromGasLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereFromGasPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereFromPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereFromValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereToAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereToContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereToGasLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereToGasPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereToPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereToValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Swap whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperSwap extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SwapOrder
 *
 * @package App\Models
 * @version June 26, 2021, 3:18 am UTC
 * @OA\Schema (
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
 * ,
 *      @OA\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="fee",
 *          description="fee",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="current_step",
 *          description="current_step",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="swap_id",
 *          description="swap_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_swap_transaction_id",
 *          description="from_swap_transaction_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="from_dex_order_request_id",
 *          description="from_dex_order_request_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_swap_transaction_id",
 *          description="to_swap_transaction_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="to_dex_order_request_id",
 *          description="to_dex_order_request_id",
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
 * )
 * @property string $id
 * @property string $status
 * @property string $fee
 * @property string $current_step
 * @property string $swap_id
 * @property string|null $from_swap_transaction_id
 * @property string|null $from_dex_order_request_id
 * @property string|null $to_swap_transaction_id
 * @property string|null $to_dex_order_request_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $dex_id
 * @property-read \App\Models\Swap $swap
 * @method static \Database\Factories\SwapOrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereCurrentStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereDexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereFromDexOrderRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereFromSwapTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereSwapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereToDexOrderRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereToSwapTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SwapOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperSwapOrder extends \Eloquent {}
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
 * @mixin IdeHelperTokenPrice
 * @property int $id
 * @property string $symbol
 * @property string $last_price
 * @property string $price_change_percent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice whereLastPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice wherePriceChangePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenPrice whereUpdatedAt($value)
 */
	class IdeHelperTokenPrice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @mixin IdeHelperUser
 * @property string $id
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class IdeHelperUser extends \Eloquent {}
}

