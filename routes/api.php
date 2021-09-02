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

Route::prefix("v1")->group(function () {
    Route::group(["prefix" => 'coin-markets-data'], function () {
        Route::get("/", [App\Http\Controllers\API\CoinMarketsDataAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\CoinMarketsDataAPIController::class, 'store']);
        Route::get("{coinMarketsData}", [App\Http\Controllers\API\CoinMarketsDataAPIController::class, 'show']);
        Route::put("{coinMarketsData}", [App\Http\Controllers\API\CoinMarketsDataAPIController::class, 'update']);
        Route::delete("{coinMarketsData}", [App\Http\Controllers\API\CoinMarketsDataAPIController::class, 'destroy']);
    });
});


Route::prefix("v1")->group(function () {
    Route::group(["prefix" => 'coins'], function () {
        Route::get("/", [App\Http\Controllers\API\CoinAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\CoinAPIController::class, 'store']);
        Route::get("{coin}", [App\Http\Controllers\API\CoinAPIController::class, 'show']);
        Route::put("{coin}", [App\Http\Controllers\API\CoinAPIController::class, 'update']);
        Route::delete("{coin}", [App\Http\Controllers\API\CoinAPIController::class, 'destroy']);
    });
});


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'cryptocurrencies'], function () {

        Route::group(['prefix' => 'prices'], function () {
            Route::get("/latest", [App\Http\Controllers\API\HistoricalPriceAPIController::class, 'index']);
        });

        Route::get("/", [App\Http\Controllers\API\CryptocurrencyAPIController::class, 'index']);
        Route::get("{cryptocurrency}", [App\Http\Controllers\API\CryptocurrencyAPIController::class, 'show']);

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
