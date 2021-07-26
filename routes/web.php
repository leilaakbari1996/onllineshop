<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\client\HomeController;
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

Route::get('/',[HomeController::class,'index']);

Route::prefix('/adminpanel')->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::get('/', function () {
        return view('admin.home');
    });
    /*Route::get('/categories',[CategoryController::class,'index'])->name('panel.categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('panel.categories.create');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('panel.categories.store');
    Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('panel.categories.edit');
    Route::patch('/categories/{category}/update',[CategoryController::class,'update'])->name('panel.categories.update');
    Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('panel.categories.destroy');*/
});
