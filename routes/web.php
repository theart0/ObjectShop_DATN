<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\permissionController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\roleController;
use App\Http\Controllers\admin\userController;
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

/* Route::get('/', function () {
    return view('welcome');
});
 */

 Route::prefix('admin')->group(function(){
     Route::get('/',[dashboardController::class,'index'])->name('dashboard.index');
     Route::prefix('category')->group(function(){
        Route::get('/',[categoryController::class,'index'])->name('category.index')->middleware('can:category_index');
        Route::get('create',[categoryController::class,'create'])->name('category.create');
        Route::post('store',[categoryController::class,'store'])->name('category.store');
        Route::get('edit/{id}',[categoryController::class,'edit'])->name('category.edit');
        Route::post('update/{id}',[categoryController::class,'update'])->name('category.update');
        Route::get('delete/{id}',[categoryController::class,'delete'])->name('category.delete');
    });
     Route::prefix('product')->group(function(){
        Route::get('/',[productController::class,'index'])->name('product.index');
        Route::get('create',[productController::class,'create'])->name('product.create');
        Route::post('store',[productController::class,'store'])->name('product.store');
        Route::get('edit/{id}',[productController::class,'edit'])->name('product.edit');
        Route::post('update/{id}',[productController::class,'update'])->name('product.update');
        Route::get('delete/{id}',[productController::class,'delete'])->name('product.delete');
    });
     Route::prefix('user')->group(function(){
        Route::get('/',[userController::class,'index'])->name('user.index');
        Route::get('create',[userController::class,'create'])->name('user.create');
        Route::post('store',[userController::class,'store'])->name('user.store');
        Route::get('edit/{id}',[userController::class,'edit'])->name('user.edit');
        Route::post('update/{id}',[userController::class,'update'])->name('user.update');
        Route::get('delete/{id}',[userController::class,'delete'])->name('user.delete');
    });
     Route::prefix('role')->group(function(){
        Route::get('/',[roleController::class,'index'])->name('role.index');
        Route::get('create',[roleController::class,'create'])->name('role.create');
        Route::post('store',[roleController::class,'store'])->name('role.store');
        Route::get('edit/{id}',[roleController::class,'edit'])->name('role.edit');
        Route::post('update/{id}',[roleController::class,'update'])->name('role.update');
        Route::get('delete/{id}',[roleController::class,'delete'])->name('role.delete');
    });
    Route::prefix('permission')->group(function(){
        Route::get('/',[permissionController::class,'index'])->name('permission.index');
        Route::get('create',[permissionController::class,'create'])->name('permission.create');
        Route::post('store',[permissionController::class,'store'])->name('permission.store');
        Route::get('edit/{id}',[permissionController::class,'edit'])->name('permission.edit');
        Route::post('update/{id}',[permissionController::class,'update'])->name('permission.update');
        Route::get('delete/{id}',[permissionController::class,'delete'])->name('permission.delete');
    });

    Route::get('form_login',[userController::class,'form_login'])->name('login.form_login');
    Route::post('sign_in',[userController::class,'sign_in'])->name('login.sign_in');
    Route::get('logout',[userController::class,'logout'])->name('login.logout');

 });