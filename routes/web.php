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
Route::get('/manage/{any}', [PublicController::class, 'manageView'])->where('any', '.*');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/register-early-access', [PublicController::class, 'registerEarlyAccessWithEmail']);
Route::get('/terms-of-service', [PublicController::class, 'termsOfServiceView']);
Route::get('/privacy-policy', [PublicController::class, 'privacyPolicyView']);
Route::get('/faqs', [PublicController::class, 'faqsView'])->name('faqs');

Route::get('/test', [PublicController::class, 'test']);
//Route::get('/pages/nft', [PublicController::class, 'nftView']);
Route::get('/download', [PublicController::class, 'download']);

Route::get('/about', [PublicController::class, 'aboutView'])->name("about");
Route::get('/terms', [PublicController::class, 'termsView'])->name("terms");
Route::get('/privacy', [PublicController::class, 'privacyView'])->name("privacy");
Route::get('/support', [PublicController::class, 'supportView'])->name("support");

$publicLocaleRoutes = function () {

    Route::group(["prefix" => 'blogs'], function () {
        Route::get('/', [PublicController::class, 'blogsView'])->name("blogs");
        Route::get('/{slug}', [PublicController::class, 'blogView'])->name("blog");
    });
    Route::get('/login', [PublicController::class, 'loginView'])->name("login");

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
