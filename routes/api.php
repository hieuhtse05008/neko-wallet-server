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

//********************************************************************************************
//Route public
//********************************************************************************************
Route::prefix("v1")->group(function () {

    Route::group(["prefix" => 'blogs'], function () {
        Route::get("/", [App\Http\Controllers\API\BlogAPIController::class, 'index'])->middleware('include:blog_groups');
        //        Route::post("/", [App\Http\Controllers\API\BlogAPIController::class, 'store']);
        Route::get("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'show']);
        //        Route::put("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'update']);
        //        Route::delete("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'blog-groups'], function () {
        Route::get("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'store']);
        Route::get("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'show']);
        //        Route::put("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'update']);
        //        Route::delete("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'destroy']);
    });
    Route::group(["prefix" => 'ref-blog-groups'], function () {
        Route::get("/", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'index']);
        //        Route::post("/", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'store']);
        Route::get("{refBlogGroup}", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'show']);
        //        Route::put("{refBlogGroup}", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'update']);
        //        Route::delete("{refBlogGroup}", [App\Http\Controllers\API\RefBlogGroupAPIController::class, 'destroy']);
    });
});

//********************************************************************************************
//Route auth
//********************************************************************************************
Route::post('/login', [App\Http\Controllers\AuthController::class, 'sanctumToken']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::prefix("auth/v1")->middleware('auth:sanctum')->group(function () {
    Route::group(["prefix" => 'blogs'], function () {
        Route::get("/profile", [App\Http\Controllers\API\BlogAPIController::class, 'getProfile']);
        Route::get("/", [App\Http\Controllers\API\BlogAPIController::class, 'index'])->middleware('include:blog_groups');
        Route::post("/", [App\Http\Controllers\API\BlogAPIController::class, 'store']);
        Route::get("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'show'])->middleware("include:blog_groups");
        Route::put("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'update']);
        Route::delete("{blog}", [App\Http\Controllers\API\BlogAPIController::class, 'destroy']);
    });

    Route::group(["prefix" => 'blog-groups'], function () {
        Route::get("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'index']);
        Route::post("/", [App\Http\Controllers\API\BlogGroupAPIController::class, 'store']);
        Route::get("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'show']);
        Route::put("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'update']);
        Route::delete("{blogGroup}", [App\Http\Controllers\API\BlogGroupAPIController::class, 'destroy']);
    });
});




//Route::prefix("v1")->group(function(){
//    Route::group(["prefix" => 'users'], function () {
//        Route::get("/", [App\Http\Controllers\API\UserAPIController::class, 'index']);
//        Route::post("/", [App\Http\Controllers\API\UserAPIController::class, 'store']);
//        Route::get("{user}", [App\Http\Controllers\API\UserAPIController::class, 'show']);
//        Route::put("{user}", [App\Http\Controllers\API\UserAPIController::class, 'update']);
//        Route::delete("{user}", [App\Http\Controllers\API\UserAPIController::class, 'destroy']);
//    });
//});
