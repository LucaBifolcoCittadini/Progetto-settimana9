<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProductCategoryController,
    ProductController
};

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/product-categories')
    ->controller(ProductCategoryController::class)
    ->group(function() {
        Route::delete('/{productCategory}', 'destroy');
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/{productCategory}/edit', 'edit');
        Route::post('/', 'store');
        Route::put('/{productCategory}', 'update');
    });

Route::prefix('/products')
    ->controller(ProductController::class)
    ->group(function() {
        Route::delete('/{product}', 'destroy');
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/{product}/edit', 'edit');
        Route::post('/', 'store');
        Route::put('/{product}', 'update');

    });