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

Route::prefix("v1")->group(function(){
    Route::group(["prefix" => 'tokens'], function () {
        Route::get("/", [App\Http\Controllers\API\TokenAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\TokenAPIController::class, 'store']);
        Route::get("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'show']);
        Route::put("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'update']);
        Route::delete("{token}", [App\Http\Controllers\API\TokenAPIController::class, 'destroy']);
    });
});
