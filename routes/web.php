<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\client\RegisterController;
use App\Http\Middleware\CheckPermission;

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
    Route::get('/',[HomeController::class,'index'])->name('index');
    Route::get('/product/{product}',[ClientProductController::class,'show'])->name('products.show');
    Route::get('/register',[RegisterController::class,'create'])->name('register');
    Route::post('/register/sendmail',[RegisterController::class,'sendMail'])->name('register.sendmail');
    Route::get('/register/otp/{user}',[RegisterController::class,'otp'])->name('register.otp');
    Route::post('/register/verifyotp/{user}',[RegisterController::class,'verifyotp'])->name('register.verifyotp');
    Route::delete('/logout',[RegisterController::class,'destroy'])->name('logout');
});
Route::prefix('/adminpanel')->middleware([
    CheckPermission::class.':view-dashbord',
    'auth'
    ]
    )->group(function(){

    Route::resource('categories',CategoryController::class);
    Route::resource('brands',BrandController::class);

    Route::get('/', function () {
        return view('admin.home');
    });
    Route::resource('products', ProductController::class);
    Route::resource('products.pictures', PictureController::class);
    Route::resource('products.discount', DiscountController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('propertyGroups',PropertyGroupController::class);


});
