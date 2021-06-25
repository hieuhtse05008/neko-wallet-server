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

//Route::middleware(["api"])->group(function (){
//    Route::get('/tokens', [TokenAPIController::class,'index']);
//    Route::post('/login', [AuthController::class,'login']);
//});
//
//Route::middleware(['auth:sanctum'])->group(function () {
//    Route::get('/users', 'UserController@index');
//});

Route::get('/test', function (){
    $api = new \App\Dex\BinanceAPI();
//    dd($api->depositAddress('BNB'));
//    return response($api->depositAddress('BNB'));
    return response()->json($api->depositAddress('BNB', 'BSC'));
});

Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'token-prices'], function () {
        Route::get("/", [App\Http\Controllers\API\TokenAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\TokenAPIController::class, 'store']);
        Route::get("/swap", [App\Http\Controllers\API\TokenAPIController::class, 'swapPreview']);
        Route::get("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'show']);
        Route::put("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'update']);
//        Route::delete("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'destroy']);
    });
});


Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'swaps'], function () {
        Route::get("/address", [App\Http\Controllers\API\SwapAPIController::class, 'swapAddress']);
        Route::get("/", [App\Http\Controllers\API\SwapAPIController::class, 'swapHistory']);
//        Route::post("/", [App\Http\Controllers\API\SwapAPIController::class, 'store']);
//        Route::get("{swap}", [App\Http\Controllers\API\SwapAPIController::class, 'show']);
//        Route::put("{swap}", [App\Http\Controllers\API\SwapAPIController::class, 'update']);
//        Route::delete("{swap}", [App\Http\Controllers\API\SwapAPIController::class, 'destroy']);
    });
});
