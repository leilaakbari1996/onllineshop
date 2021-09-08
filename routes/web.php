<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FeaturedCategoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ProductPropertyController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\client\RegisterController;
use App\Http\Middleware\CheckPermission;
use App\Models\FeaturedCategory;

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
    Route::post('/products/{product}/comments/store',[CommentController::class,'store'])
    ->name('products.comments.store');
    Route::get('/likes/',[LikeController::class,'index'])->name('likeList');
    Route::post('/likes/{product}',[LikeController::class,'store'])->name('like');
    Route::delete('/likes/{product}',[LikeController::class,'destroy'])->name('likes.destroy');
    Route::post('/cart/{product}',[CartController::class,'store'])->name('cart.store');
    Route::get('/cart/',[CartController::class,'index'])->name('cart.index');
    Route::delete('/cart/{product}',[CartController::class,'destroy'])->name('cart.destroy');
    Route::get('/orders/create',[OrderController::class,'create'])->name('order.create');
    Route::patch('/cart/{product}',[CartController::class,'update'])->name('cart.update');
    Route::post('/order/store',[OrderController::class,'store'])->name('order.store');
    Route::get('/order/payment/callback',[OrderController::class,'callback'])->name('order.callback');
    Route::get('/order/{order}',[OrderController::class,'show'])->name('order.show');


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
    Route::resource('properties', PropertyController::class);
    Route::get('/products/{product}/properties',[ProductPropertyController::class,'index'])
    ->name('products.properties.index');
    Route::post('/products/{product}/properties',[ProductPropertyController::class,'store'])
    ->name('products.properties.store');
    Route::get('/products/{product}/properties/create',[ProductPropertyController::class,'create'])
    ->name('products.properties.create');
    Route::get('/products/{product}/comments',[AdminCommentController::class,'index'])
    ->name('products.comments.index');
    Route::delete('/products/comments/{comment}/destroy',[AdminCommentController::class,'destroy'])
    ->name('products.comments.destroy');
    Route::resource('sliders', SliderController::class);
    Route::get('/featuredCategory/create',[FeaturedCategoryController::class,'create'])
    ->name('featuredCategory.create');
    Route::post('/featuredCategory/',[FeaturedCategoryController::class,'store'])
    ->name('featuredCategory.store');
    Route::resource('offers',OfferController::class);






});
