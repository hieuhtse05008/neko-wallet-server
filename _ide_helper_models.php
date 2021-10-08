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
 * Class Blog
 *
 * @package App\Models
 * @version September 23, 2021, 8:05 am UTC
 * @OA\Schema (
 *     title="Blog",
 *     @OA\Xml(
 *         name="Blog"
 *     ),
 *     required={"title", "tags"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="title",
 *          description="title",
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
 *          property="content_en",
 *          description="content_en",
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
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="tags",
 *          description="tags",
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
 * @mixin IdeHelperBlog
 * @property int $id
 * @property string|null $slug
 * @property string $title
 * @property string|null $image_url
 * @property string|null $content_en
 * @property string|null $status
 * @property string|null $type
 * @property string|null $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $description
 * @method static \Database\Factories\BlogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContentEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
	class IdeHelperBlog extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Category
 *
 * @package App\Models
 * @version September 15, 2021, 4:54 am UTC
 * @OA\Schema (
 *     title="Category",
 *     @OA\Xml(
 *         name="Category"
 *     ),
 *     required={"name"},
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
 * @mixin IdeHelperCategory
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cryptocurrency[] $cryptocurrencies
 * @property-read int|null $cryptocurrencies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CryptocurrencyCategory[] $cryptocurrencyCategories
 * @property-read int|null $cryptocurrency_categories_count
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class IdeHelperCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Cryptocurrency
 *
 * @package App\Models
 * @version September 2, 2021, 10:09 am UTC
 * @OA\Schema (
 *     title="Cryptocurrency",
 *     @OA\Xml(
 *         name="Cryptocurrency"
 *     ),
 *     required={"name", "symbol", "slug", "verified"},
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
 *          property="slug",
 *          description="slug",
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
 *          property="rank",
 *          description="rank",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="verified",
 *          description="verified",
 *          type="boolean"
 *      )
 * 
 * )
 * @mixin IdeHelperCryptocurrency
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property string $slug
 * @property string|null $icon_url
 * @property int|null $rank
 * @property bool $verified
 * @property string|null $first_historical_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\CryptocurrencyInfo|null $cryptocurrency_info
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ExchangePair[] $exchange_pairs
 * @property-read int|null $exchange_pairs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\CryptocurrencyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereFirstHistoricalData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cryptocurrency whereVerified($value)
 */
	class IdeHelperCryptocurrency extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CryptocurrencyCategory
 *
 * @package App\Models
 * @version September 18, 2021, 8:32 am UTC
 * @OA\Schema (
 *     title="CryptocurrencyCategory",
 *     @OA\Xml(
 *         name="CryptocurrencyCategory"
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
 *          property="cryptocurrency_id",
 *          description="cryptocurrency_id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="category_id",
 *          description="category_id",
 *          type="integer",
 *          format="int32"
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
 * @mixin IdeHelperCryptocurrencyCategory
 * @property int $id
 * @property int|null $cryptocurrency_id
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Cryptocurrency|null $cryptocurrency
 * @method static \Database\Factories\CryptocurrencyCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory whereCryptocurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyCategory whereUpdatedAt($value)
 */
	class IdeHelperCryptocurrencyCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CryptocurrencyInfo
 *
 * @package App\Models
 * @version September 15, 2021, 4:33 am UTC
 * @OA\Schema (
 *     title="CryptocurrencyInfo",
 *     @OA\Xml(
 *         name="CryptocurrencyInfo"
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
 *          property="cryptocurrency_id",
 *          description="cryptocurrency_id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="links",
 *          description="links",
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
 * @mixin IdeHelperCryptocurrencyInfo
 * @property int $id
 * @property int|null $cryptocurrency_id
 * @property string|null $description
 * @property object|null $links
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed|null $test
 * @property float|null $current_supply
 * @property float|null $max_supply
 * @property object|null $market_cap_dominance
 * @property int|null $holder_count
 * @property float|null $fully_diluted_market_cap
 * @property string|null $status
 * @property-read \App\Models\Cryptocurrency|null $cryptocurrency
 * @method static \Database\Factories\CryptocurrencyInfoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereCryptocurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereCurrentSupply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereFullyDilutedMarketCap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereHolderCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereMarketCapDominance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereMaxSupply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyInfo whereUpdatedAt($value)
 */
	class IdeHelperCryptocurrencyInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CryptocurrencyMapping
 *
 * @package App\Models
 * @version September 2, 2021, 10:14 am UTC
 * @OA\Schema (
 *     title="CryptocurrencyMapping",
 *     @OA\Xml(
 *         name="CryptocurrencyMapping"
 *     ),
 *     required={"cryptocurrency_id"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
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
 *          property="coingecko_id",
 *          description="coingecko_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="cmc_id",
 *          description="cmc_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="binance_id",
 *          description="binance_id",
 *          type="string"
 *      )
 * 
 * )
 * @mixin IdeHelperCryptocurrencyMapping
 * @property int $id
 * @property int $cryptocurrency_id
 * @property string|null $coingecko_id
 * @property string|null $cmc_id
 * @property string|null $binance_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cryptocurrency $cryptocurrency
 * @method static \Database\Factories\CryptocurrencyMappingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping query()
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping whereBinanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping whereCmcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping whereCoingeckoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping whereCryptocurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CryptocurrencyMapping whereUpdatedAt($value)
 */
	class IdeHelperCryptocurrencyMapping extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EarlyAccessEmail
 *
 * @mixin IdeHelperEarlyAccessEmail
 * @property int $id
 * @property string $email
 * @property string|null $code
 * @property string|null $ref
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EarlyAccessEmail whereUpdatedAt($value)
 */
	class IdeHelperEarlyAccessEmail extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $url
 * @property string|null $image_url
 * @property string|null $coingecko_id
 * @property object|null $guide_html
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ExchangePair[] $exchangePairs
 * @property-read int|null $exchange_pairs_count
 * @method static \Database\Factories\ExchangeGuideFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereCoingeckoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereGuideHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeGuide whereUrl($value)
 */
	class IdeHelperExchangeGuide extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ExchangePair
 *
 * @package App\Models
 * @version September 15, 2021, 4:56 am UTC
 * @OA\Schema (
 *     title="ExchangePair",
 *     @OA\Xml(
 *         name="ExchangePair"
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
 *          property="trade_url",
 *          description="trade_url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="base_token_id",
 *          description="base_token_id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="target_token_id",
 *          description="target_token_id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="exchange_guide_id",
 *          description="exchange_guide_id",
 *          type="integer",
 *          format="int32"
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
 * @mixin IdeHelperExchangePair
 * @property int $id
 * @property string|null $trade_url
 * @property int|null $base_token_id
 * @property int|null $target_token_id
 * @property int|null $exchange_guide_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Token|null $baseToken
 * @property-read \App\Models\ExchangeGuide|null $exchangeGuide
 * @property-read \App\Models\Token|null $targetToken
 * @method static \Database\Factories\ExchangePairFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair whereBaseTokenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair whereExchangeGuideId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair whereTargetTokenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair whereTradeUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangePair whereUpdatedAt($value)
 */
	class IdeHelperExchangePair extends \Eloquent {}
}

namespace App\Models{
/**
 * Class HistoricalPrice
 *
 * @package App\Models
 * @version September 2, 2021, 9:38 am UTC
 * @OA\Schema (
 *     title="HistoricalPrice",
 *     @OA\Xml(
 *         name="HistoricalPrice"
 *     ),
 *     required={""},
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
 * @mixin IdeHelperHistoricalPrice
 * @property int $cryptocurrency_id
 * @property float|null $price
 * @property float|null $volume_24h
 * @property float|null $market_cap
 * @property \Illuminate\Support\Carbon $time
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice whereCryptocurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice whereMarketCap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricalPrice whereVolume24h($value)
 */
	class IdeHelperHistoricalPrice extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Network
 *
 * @package App\Models
 * @version September 2, 2021, 10:16 am UTC
 * @OA\Schema (
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
 * ,
 *      @OA\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="chain_id",
 *          description="chain_id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="icon_url",
 *          description="icon_url",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="short_name",
 *          description="short_name",
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
 *          property="wallet_derive_path",
 *          description="wallet_derive_path",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="is_active",
 *          description="is_active",
 *          type="boolean"
 *      )
 * 
 * )
 * @mixin IdeHelperNetwork
 * @property int $id
 * @property string $name
 * @property int|null $chain_id
 * @property string|null $icon_url
 * @property string|null $short_name
 * @property string|null $symbol
 * @property string|null $wallet_derive_path
 * @property bool $is_active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\NetworkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Network newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Network newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Network query()
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereChainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Network whereWalletDerivePath($value)
 */
	class IdeHelperNetwork extends \Eloquent {}
}

namespace App\Models{
/**
 * Class NetworkMapping
 *
 * @package App\Models
 * @version September 2, 2021, 10:17 am UTC
 * @OA\Schema (
 *     title="NetworkMapping",
 *     @OA\Xml(
 *         name="NetworkMapping"
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
 *          property="network_id",
 *          description="network_id",
 *          type="integer",
 *          format="int32"
 *      )
 * ,
 *      @OA\Property(
 *          property="coingecko_id",
 *          description="coingecko_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="cmc_id",
 *          description="cmc_id",
 *          type="string"
 *      )
 * ,
 *      @OA\Property(
 *          property="binance_id",
 *          description="binance_id",
 *          type="string"
 *      )
 * 
 * )
 * @mixin IdeHelperNetworkMapping
 * @property int $id
 * @property int|null $network_id
 * @property string|null $coingecko_id
 * @property string|null $cmc_id
 * @property string|null $binance_id
 * @property-read \App\Models\Network|null $network
 * @method static \Database\Factories\NetworkMappingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping newQuery()
 * @method static \Illuminate\Database\Query\Builder|NetworkMapping onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping query()
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping whereBinanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping whereCmcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping whereCoingeckoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NetworkMapping whereNetworkId($value)
 * @method static \Illuminate\Database\Query\Builder|NetworkMapping withTrashed()
 * @method static \Illuminate\Database\Query\Builder|NetworkMapping withoutTrashed()
 */
	class IdeHelperNetworkMapping extends \Eloquent {}
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
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property int $decimals
 * @property string $address
 * @property string|null $icon_url
 * @property bool $verified
 * @property bool $active_wallet
 * @property int|null $cryptocurrency_id
 * @property int|null $network_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $swappable
 * @property bool $enable_profit_loss
 * @property-read \App\Models\Cryptocurrency|null $cryptocurrency
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ExchangeGuide[] $exchange_guides
 * @property-read int|null $exchange_guides_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ExchangePair[] $exchange_pairs
 * @property-read int|null $exchange_pairs_count
 * @property-read \App\Models\Network|null $network
 * @method static \Database\Factories\TokenFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Token newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token query()
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereActiveWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereCryptocurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereDecimals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereEnableProfitLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereNetworkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereSwappable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereVerified($value)
 */
	class IdeHelperToken extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string|null $avatar_url
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $dob
 * @property string|null $gender
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class IdeHelperUser extends \Eloquent {}
}

