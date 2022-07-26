<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function () {
    $api = new \App\Dex\BinanceAPI();
    //    dd($api->depositAddress('BNB'));
    //    return response($api->depositAddress('BNB'));
    return response()->json($api->depositAddress('BNB', 'BSC'));
});

//********************************************************************************************
//Route public
//********************************************************************************************
Route::prefix("v1")->group(function () {
    Route::group(["prefix" => 'cryptocurrencies'], function () {
        Route::group(['prefix' => 'prices'], function () {
            Route::get("/latest", [App\Http\Controllers\API\HistoricalPriceAPIController::class, 'latest']);
        });
        Route::get("/", [App\Http\Controllers\API\CryptocurrencyAPIController::class, 'index']);
        Route::get("{cryptocurrency}", [App\Http\Controllers\API\CryptocurrencyAPIController::class, 'show'])
            ->middleware("include:cryptocurrency_info,categories,tokens.network");
    });
    Route::group(["prefix" => 'networks'], function () {
        Route::get("/", [App\Http\Controllers\API\NetworkAPIController::class, 'index']);
        Route::get("{network}", [App\Http\Controllers\API\NetworkAPIController::class, 'show']);
    });
    Route::group(["prefix" => 'tokens'], function () {
        Route::get("/", [App\Http\Controllers\API\TokenAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\TokenAPIController::class, 'store']);
        Route::get("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'show']);
    });
    Route::group(["prefix" => 'cryptocurrency-infos'], function () {
        Route::get("/", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'store']);
        Route::get("{cryptocurrencyInfo}", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'show']);
        //        Route::put("{cryptocurrencyInfo}", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'update']);
        //        Route::delete("{cryptocurrencyInfo}", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'categories'], function () {
        Route::get("/", [App\Http\Controllers\API\CategoryAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\CategoryAPIController::class, 'store']);
        Route::get("{category}", [App\Http\Controllers\API\CategoryAPIController::class, 'show']);
        //        Route::put("{category}", [App\Http\Controllers\API\CategoryAPIController::class, 'update']);
        //        Route::delete("{category}", [App\Http\Controllers\API\CategoryAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'exchange-guides'], function () {
        Route::get("/", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'store']);
        Route::get("{exchangeGuide}", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'show']);
        //        Route::put("{exchangeGuide}", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'update']);
        //        Route::delete("{exchangeGuide}", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'exchange-pairs'], function () {
        Route::get("/", [App\Http\Controllers\API\ExchangePairAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\ExchangePairAPIController::class, 'store']);
        Route::get("{exchangePair}", [App\Http\Controllers\API\ExchangePairAPIController::class, 'show']);
        //        Route::put("{exchangePair}", [App\Http\Controllers\API\ExchangePairAPIController::class, 'update']);
        //        Route::delete("{exchangePair}", [App\Http\Controllers\API\ExchangePairAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'cryptocurrency-categories'], function () {
        Route::get("/", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'store']);
        Route::get("{cryptocurrencyCategory}", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'show']);
        //        Route::put("{cryptocurrencyCategory}", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'update']);
        //        Route::delete("{cryptocurrencyCategory}", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'blogs'], function () {
        Route::get("/", [App\Http\Controllers\API\BlogAPIController::class, 'index'])->middleware('include:blog_groups');
        //        Route::post("/", [App\Http\Controllers\API\BlogAPIController::class, 'store']);
        Route::get("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'show']);
        //        Route::put("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'update']);
        //        Route::delete("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'blog-groups'], function () {
        Route::get("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'store']);
        Route::get("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'show']);
        //        Route::put("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'update']);
        //        Route::delete("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'ref-blog-groups'], function () {
        Route::get("/", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'store']);
        Route::get("{refBlogGroup}", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'show']);
        //        Route::put("{refBlogGroup}", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'update']);
        //        Route::delete("{refBlogGroup}", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'destroy']);
    });
});

//********************************************************************************************
//Route auth
//********************************************************************************************
Route::post('/login', [App\Http\Controllers\AuthController::class, 'sanctumToken']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::prefix("auth/v1")->middleware('auth:sanctum')->group(function () {
    Route::group(["prefix" => 'blogs'], function () {
        Route::get("/", [App\Http\Controllers\API\BlogAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\BlogAPIController::class, 'store']);
        Route::get("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'show'])->middleware("include:blog_groups");
        Route::put("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'update']);
        Route::delete("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'destroy']);
    });

    Route::group(["prefix" => 'blog-groups'], function () {
        Route::get("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'store']);
        Route::get("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'show']);
        Route::put("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'update']);
        Route::delete("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'destroy']);
    });
});




//Route::prefix("v1")->group(function(){
//    Route::group(["prefix" => 'users'], function () {
//        Route::get("/", [App\Http\Controllers\API\UserAPIController::class, 'index']);
//        Route::post("/", [App\Http\Controllers\API\UserAPIController::class, 'store']);
//        Route::get("{user}", [App\Http\Controllers\API\UserAPIController::class, 'show']);
//        Route::put("{user}", [App\Http\Controllers\API\UserAPIController::class, 'update']);
//        Route::delete("{user}", [App\Http\Controllers\API\UserAPIController::class, 'destroy']);
//    });
//});
