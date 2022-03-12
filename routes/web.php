<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

Route::group(['prefix' => "/"], function(){
    Route::get("/", [App\Http\Controllers\HomeController::class, 'index']) -> name("home");
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    //
    Route::get('/test', [App\Http\Controllers\HomeController::class, 'welcome'])->name('test');
});

Route::group(['prefix' => 'user'], function(){
    Route::get("thong-tin", [App\Http\Controllers\UserController::class, 'info'])->middleware('auth');
});

Route::group(['prefix' => 'khuyen-mai'], function(){
    Route::get("/", [App\Http\Controllers\PromotionController::class, 'index']);
    Route::get("/product", [App\Http\Controllers\PromotionController::class, 'getProduct']);

});

Route::group(['prefix' => 'tin-tuc'], function(){
    Route::get("/", [App\Http\Controllers\BlogController::class, 'index']);
});

Route::group(['prefix' => 'gioi-thieu'], function(){
    Route::get("/", [App\Http\Controllers\ContactController::class, 'index']);
});

Route::group(['prefix' => 'san-pham'], function(){
    Route::group(["prefix" => 'api'], function (){
        Route::get("search", [\App\Http\Controllers\ProductController::class, 'getDataSearch']);
        Route::get("search/{search}", [\App\Http\Controllers\ProductController::class, 'getDataSearch']);
        Route::get("count-cart", [\App\Http\Controllers\ProductController::class, 'getCountCart']);
        Route::get("vote", [\App\Http\Controllers\ProductController::class, 'VoteStore'])->middleware("auth");
        Route::get("vote-view", [\App\Http\Controllers\ProductController::class, 'VoteView']);
        Route::get("list-cmt", [\App\Http\Controllers\ProductController::class, 'getCmtPrd']);
    });
    Route::get("/tim-kiem", [App\Http\Controllers\ProductController::class, 'getSearch']);
    Route::get("/tim-kiem/{search}", [App\Http\Controllers\ProductController::class, 'getSearch']);
    Route::get("/yeu-thich", [App\Http\Controllers\ProductController::class, 'getLike'])->middleware("auth");
    Route::get("/gio-hang", [App\Http\Controllers\ProductController::class, 'getCart'])->middleware("auth");
    Route::get("/thanh-toan", [App\Http\Controllers\ProductController::class, 'PayProducts'])->middleware("auth");
    Route::get("/detail/{id}-{slug}", [App\Http\Controllers\ProductController::class, 'productDetail']);
});

Route::group(['prefix' => 'getview'], function(){
    Route::get("/address-payment", [App\Http\Controllers\ApiViewController::class, 'getViewAddressPayProduct']);
});

Route::middleware(["auth"]) -> group(function (){

    Route::prefix("admin") -> group(function (){

        #MAIN
        Route::get("/",[\App\Http\Controllers\AdminController::class,"index"]) -> name("admin");

        #admin
        Route::prefix("product") -> group(function (){
            Route::get("add",[\App\Http\Controllers\ProductController::class,"create"]);
            Route::post("add",[\App\Http\Controllers\ProductController::class,"store"]);
            Route::get("type/{type_count}",[\App\Http\Controllers\ProductController::class,"addType"]);
            Route::get("show", [\App\Http\Controllers\ProductController::class, "adminGetProduct"]);
            Route::get("status/{status}", [\App\Http\Controllers\ProductController::class, "getProductAction"]);
            Route::get("active/{id}", [\App\Http\Controllers\ProductController::class, "activeProduct"]);
            Route::get("delete/{id}", [\App\Http\Controllers\ProductController::class, "deleteProduct"]);
        });
        #Category
        Route::prefix("category") -> group(function (){
            Route::get("get", [\App\Http\Controllers\ProductController::class, "categoryView"]);
            Route::get("get/{id}", [\App\Http\Controllers\ProductController::class, "categoryView"]);
             Route::get("add/{name}", [\App\Http\Controllers\ProductController::class, "categoryStore"]);
            Route::get("active/{id}", [\App\Http\Controllers\ProductController::class, "activeCategory"]);
            Route::get("unactive/{id}", [\App\Http\Controllers\ProductController::class, "unactiveCategory"]);
            Route::get("delete/{id}", [\App\Http\Controllers\ProductController::class, "deleteCategory"]);
        });
        #acount
        Route::prefix("account") -> group(function (){
            Route::get("get",[\App\Http\Controllers\UserController::class,"get"]);
            Route::get("get/{id}",[\App\Http\Controllers\UserController::class,"get"]);
            Route::get("get/status/{status}",[\App\Http\Controllers\UserController::class,"status"]);
        });
    });

});
Route::get("check", [App\Http\Controllers\CheckController::class, 'index']);
Route::post("check/store", [App\Http\Controllers\CheckController::class, 'store']);
Auth::routes();
