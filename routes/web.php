<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Client\ProductController as ClientProductController;

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


Route::prefix('')->name('client.')->group(function(){
    Route::get('/',[HomeController::class,'index']);
    Route::get('/product/{product}',[ClientProductController::class,'show'])->name('products.show');
});
Route::prefix('/adminpanel')->group(function(){

    Route::resource('categories',CategoryController::class);
    Route::resource('brands',BrandController::class);
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::resource('products', ProductController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('products.pictures', PictureController::class);
    Route::resource('products.discount', DiscountController::class);
});
