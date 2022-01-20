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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [\App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('/auth', [\App\Http\Controllers\AuthorizationController::class, 'index']);

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'category'])
        ->where('id', '[0-9]+');

Route::resource('/admin/news', \App\Http\Controllers\Admin\NewsController::class);

