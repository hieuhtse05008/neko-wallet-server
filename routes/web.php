<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ViewAuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Locale Web Routes
|--------------------------------------------------------------------------
*/
//$routesWithLocale = function () {
//    Route::group(["prefix" => 'blogs'], function () {
//        Route::get('/{slug}', [PublicController::class, 'blogView']);
//        Route::get('/', [PublicController::class, 'blogsView']);
//    });
//};
//Route::middleware('locale')->group($routesWithLocale);
//Route::prefix('{lang?}')->middleware('locale')->group($routesWithLocale);


/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [PublicController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/register-early-access', [PublicController::class, 'registerEarlyAccessWithEmail']);
Route::get('/terms-of-service', [PublicController::class, 'termsOfServiceView']);
Route::get('/privacy-policy', [PublicController::class, 'privacyPolicyView']);
Route::group(["prefix" => 'mobile'], function () {
    Route::get('/cryptocurrency/{cryptocurrency:id}', [PublicController::class, 'cryptocurrencyMobileView']);
});
Route::get('/test', [PublicController::class, 'test']);
Route::get('/pages/nft', [PublicController::class, 'nftView']);

$publicLocaleRoutes = function () {

    Route::group(["prefix" => 'blogs'], function () {
        Route::get('/', [PublicController::class, 'blogsView'])->name("blogs");
        Route::get('/{slug}', [PublicController::class, 'blogView'])->name("blog");
    });
    Route::get('/login', [PublicController::class, 'loginView'])->name("login");
    Route::get('/cryptocurrencies', [PublicController::class, 'tokensView'])->middleware("include:cryptocurrencies")->name("cryptocurrencies");
    Route::get('/cryptocurrency/{cryptocurrency:name}', [PublicController::class, 'tokenView'])->name("cryptocurrency");

    Route::get('/v2', [PublicController::class, 'homeViewV2'])->name("home-v2");
    Route::get('/', [PublicController::class, 'homeView'])->name("home");
};

Route::prefix('{lang?}')
//    ->where(['lang'=>'[a-zA-Z]{2}'])
    ->middleware('locale')->group($publicLocaleRoutes);

/*
|--------------------------------------------------------------------------
| Auth Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/blog/upload/{blog?}', [ViewAuthController::class, 'uploadBlogView'])->middleware('include:blog_groups');

});
