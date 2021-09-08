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

Route::get('/cryptocurrencies',[PublicController::class,'tokensView']);

Route::get('/test', [AuthController::class,'test']);
Route::get('/surf-news', [PublicController::class,'surfNewsView']);
Route::get('/dashboard', [PublicController::class,'dashboardView']);

Route::get('/load-news', [PublicController::class,'loadNews']);
Route::post('/push-news-telegram', [PublicController::class,'pushNewsTelegram']);
Route::post('/register-early-access', [PublicController::class,'registerEarlyAccessWithEmail']);
Route::get('/search-coin', [PublicController::class,'searchCoin']);
Route::get('/cryptocurrency/{coin:name}', [PublicController::class,'tokenView']);
//Route::post('/login', [AuthController::class,'login']);
