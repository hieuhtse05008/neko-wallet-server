<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'homeView']);

Route::get('/cryptocurrencies', [PublicController::class, 'tokensView']);

Route::get('/test', [AuthController::class, 'test']);


Route::post('/register-early-access', [PublicController::class, 'registerEarlyAccessWithEmail']);

Route::get('/cryptocurrency/{cryptocurrency:name}', [PublicController::class, 'tokenView']);
Route::group(["prefix" => 'mobile'], function () {
    Route::get('/cryptocurrency/{cryptocurrency:id}', [PublicController::class, 'cryptocurrencyMobileView']);
});
//Route::post('/login', [AuthController::class,'login']);
