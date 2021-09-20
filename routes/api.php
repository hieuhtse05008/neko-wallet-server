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

Route::get('/telegram', [App\Http\Controllers\API\TelegramAPIController::class, 'index']);


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'cryptocurrencies'], function () {
        Route::group(['prefix' => 'prices'], function () {
            Route::get("/latest", [App\Http\Controllers\API\HistoricalPriceAPIController::class, 'latest']);
        });
        Route::get("/", [App\Http\Controllers\API\CryptocurrencyAPIController::class, 'index']);
        Route::get("{cryptocurrency}", [App\Http\Controllers\API\CryptocurrencyAPIController::class, 'show'])
            ->middleware("include:cryptocurrency_info,tokens.network");

    });
});

Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'networks'], function () {
        Route::get("/", [App\Http\Controllers\API\NetworkAPIController::class, 'index']);
        Route::get("{network}", [App\Http\Controllers\API\NetworkAPIController::class, 'show']);
    });
});

Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'tokens'], function () {
        Route::get("/", [App\Http\Controllers\API\TokenAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\TokenAPIController::class, 'store']);
        Route::get("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'show']);
    });
});


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'cryptocurrency-infos'], function () {
        Route::get("/", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'store']);
        Route::get("{cryptocurrencyInfo}", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'show']);
        Route::put("{cryptocurrencyInfo}", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'update']);
        Route::delete("{cryptocurrencyInfo}", [App\Http\Controllers\API\CryptocurrencyInfoAPIController::class, 'destroy']);
    });
});


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'categories'], function () {
        Route::get("/", [App\Http\Controllers\API\CategoryAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\CategoryAPIController::class, 'store']);
        Route::get("{category}", [App\Http\Controllers\API\CategoryAPIController::class, 'show']);
        Route::put("{category}", [App\Http\Controllers\API\CategoryAPIController::class, 'update']);
        Route::delete("{category}", [App\Http\Controllers\API\CategoryAPIController::class, 'destroy']);
    });
});


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'exchange-guides'], function () {
        Route::get("/", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'store']);
        Route::get("{exchangeGuide}", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'show']);
        Route::put("{exchangeGuide}", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'update']);
        Route::delete("{exchangeGuide}", [App\Http\Controllers\API\ExchangeGuideAPIController::class, 'destroy']);
    });
});


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'exchange-pairs'], function () {
        Route::get("/", [App\Http\Controllers\API\ExchangePairAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\ExchangePairAPIController::class, 'store']);
        Route::get("{exchangePair}", [App\Http\Controllers\API\ExchangePairAPIController::class, 'show']);
        Route::put("{exchangePair}", [App\Http\Controllers\API\ExchangePairAPIController::class, 'update']);
        Route::delete("{exchangePair}", [App\Http\Controllers\API\ExchangePairAPIController::class, 'destroy']);
    });
});


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'cryptocurrency-categories'], function () {
        Route::get("/", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'store']);
        Route::get("{cryptocurrencyCategory}", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'show']);
        Route::put("{cryptocurrencyCategory}", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'update']);
        Route::delete("{cryptocurrencyCategory}", [App\Http\Controllers\API\CryptocurrencyCategoryAPIController::class, 'destroy']);
    });
});
