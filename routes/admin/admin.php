<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
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
    Route::resource('/category',CategoryController::class);
    Route::resource('/subcategory',SubcategoryController::class);
    Route::resource('/brand',BrandController::class);

});