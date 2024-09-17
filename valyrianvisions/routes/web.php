<?php

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeaturedProductsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;




Route::get('/', [FeaturedProductsController::class, 'show']);
Route::get('/products', [App\Http\Controllers\ProductPageController::class, 'index']);
Route::get('cart/cart',[App\Http\Controllers\CartController::class, 'index']);

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


Auth::routes();
Route::middleware(App\Http\Middleware\UserRoleMiddleware::class)->group(function(){
    Route::post('cart/save', [App\Http\Controllers\CartController::class, 'save']);


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(App\Http\Middleware\AdminRoleMiddleware::class)->group(function(){
    Route::get('product/create', [App\Http\Controllers\ProductController::class,'create']);
    Route::post('product/save', [App\Http\Controllers\ProductController::class, 'save']);
    Route::get('product/index',[App\Http\Controllers\ProductController::class, 'index']);
});



Route::get('product/edit/{item}',[App\Http\Controllers\ProductController::class, 'edit']);
Route::post('product/update/{item}', [App\Http\Controllers\ProductController::class, 'update']);

Route::post('product/delete',[App\Http\Controllers\ProductController::class, 'delete']);

