<?php

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeaturedProductsController;



Route::get('/', [FeaturedProductsController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(App\Http\Middleware\AdminRoleMiddleware::class)->group(function(){
    Route::get('product/create', [App\Http\Controllers\ProductController::class,'create']);
    Route::post('product/save', [App\Http\Controllers\ProductController::class, 'save']);
    Route::get('product/index',[App\Http\Controllers\ProductController::class, 'index']);
});



Route::get('product/edit/{item}',[App\Http\Controllers\ProductController::class, 'edit']);
Route::post('product/update/{item}', [App\Http\Controllers\ProductController::class, 'update']);

Route::post('product/delete',[App\Http\Controllers\ProductController::class, 'delete']);

