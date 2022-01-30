<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);

Route::get('/categories/{cat_id}/news', [\App\Http\Controllers\NewsController::class, 'getNewsByCatId'])
    ->where('cat_id', '[0-9]+')
    ->name('categories::news');

Route::get('/categories/{cat_id}/news/{id}', [\App\Http\Controllers\NewsController::class, 'getOneNews'])
    ->where('cat_id', '[0-9]+')
    ->where('id', '[0-9]+')
    ->name('categories::news::card');

Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])
    ->name('order');

Route::post('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])
    ->name('order::create');

Route::get('/db', [\App\Http\Controllers\DbController::class, 'index']);
