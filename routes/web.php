<?php

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


Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);

Route::get('/categories/news', [\App\Http\Controllers\NewsController::class, 'index'])
    ->name('categories::news');

Route::get('/categories/news/{id}', [\App\Http\Controllers\NewsController::class, 'getNews'])
    ->where('id', '[0-9]+');

Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])
    ->name('order');

Route::post('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])
    ->name('order::create');

//Route::get('/auth', [\App\Http\Controllers\AuthorizationController::class, 'index']);
//Route::resource('/admin/news', \App\Http\Controllers\Admin\NewsController::class);