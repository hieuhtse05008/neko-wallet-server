<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ViewAuthController;
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

Route::get('/login', [PublicController::class, 'loginView']);
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout']);

Route::get('/cryptocurrencies', [PublicController::class, 'tokensView'])->middleware("include:cryptocurrencies");
Route::get('/cryptocurrency/{cryptocurrency:name}', [PublicController::class, 'tokenView']);

Route::post('/register-early-access', [PublicController::class, 'registerEarlyAccessWithEmail']);


//Route::group(["prefix" => 'blogs'], function () {
//    Route::get('/{slug}', [PublicController::class, 'blogView']);
//    Route::get('/', [PublicController::class, 'blogsView']);
//});

Route::get('/terms-of-service', [PublicController::class, 'termsOfServiceView']);
Route::get('/privacy-policy', [PublicController::class, 'privacyPolicyView']);

Route::group(["prefix" => 'mobile'], function () {
    Route::get('/cryptocurrency/{cryptocurrency:id}', [PublicController::class, 'cryptocurrencyMobileView']);
});

Route::get('/test', [PublicController::class, 'test']);


/*
|--------------------------------------------------------------------------
| Auth Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/blog/upload/{blog?}', [ViewAuthController::class, 'uploadBlogView'])->middleware('include:blog_groups');
});


/*
|--------------------------------------------------------------------------
| Locale Web Routes
|--------------------------------------------------------------------------
*/
$routesWithLocale = function (){
    Route::group(["prefix" => 'blogs'], function () {
        Route::get('/{slug}', [PublicController::class, 'blogView']);
        Route::get('/', [PublicController::class, 'blogsView']);
    });
};
Route::middleware('locale')->group($routesWithLocale);
Route::prefix('{lang?}')->middleware('locale')->group($routesWithLocale);

