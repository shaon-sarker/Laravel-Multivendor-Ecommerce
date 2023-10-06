<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;

Route::prefix('admin')->group(function(){
    Route::get('/adl/login',[AuthController::class,'index'])->name('login.page');
    Route::post('/login/owner',[AuthController::class,'login'])->name('admin.login');
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/profile',[AuthController::class,'profile'])->name('admin.profile')->middleware('admin');
    Route::post('/profile-update/{admin}',[AuthController::class,'update'])->name('admin.profile.update')->middleware('admin');
    Route::post('/passowrd-update/{admin}',[AuthController::class,'updatepassowrd'])->name('admin.password.update')->middleware('admin');
    Route::get('/logout',[AuthController::class,'adminlogout'])->name('admin.logout')->middleware('admin');
});

Route::middleware('admin')->prefix('admin')->group(function(){
    Route::resource('/brand',BrandController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/subcategory',SubcategoryController::class);
});

Route::controller(ProductController::class)->middleware('admin')->prefix('admin')->group(function(){
    Route::get('/product', 'index')->name('product.index');
    Route::get('/product/create', 'create')->name('product.create');
    Route::post('/product/store', 'store')->name('product.store');
    Route::get('/product/edit/{id}', 'edit')->name('product.edit');
    Route::post('/product/update', 'update')->name('product.update');
    Route::post('/product/update/image', 'updateproductimage')->name('product.update.image');
    Route::post('/product/update/multiimage', 'updateproductmultiimage')->name('product.update.multiimage');
    Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');
    Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');
    Route::get('/delete/product/{id}' , 'ProductDelete')->name('product.delete');
});