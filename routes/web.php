<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::resource('categories', CategoryController::class)->except('show');

    Route::get('products/{product}/image-upload', [ProductController::class, 'image'])->name('products.image');
    Route::resource('products', ProductController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
