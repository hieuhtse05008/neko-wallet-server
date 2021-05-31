<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\TokenAPIController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('/register-info', [AuthController::class,'registerInfo']);

Route::get('/test', [AuthController::class,'test']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware(["api"])->group(function (){
    Route::get('/tokens', [TokenAPIController::class,'index']);
    Route::post('/login', [AuthController::class,'login']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', 'UserController@index');
});


Route::resource('tokens', App\Http\Controllers\API\TokenAPIController::class);
