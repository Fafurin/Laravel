<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);

//Route::get('/{locale}', [\App\Http\Controllers\WelcomeController::class, 'locale'])
//    ->name('locale');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);

Route::get('/categories/{categoryId}/news', [\App\Http\Controllers\NewsController::class, 'list'])
    ->where('categoryId', '[0-9]+')
    ->name('categories::news');

Route::get('/categories/{categoryId}/news/{newsId}', [\App\Http\Controllers\NewsController::class, 'getOneNews'])
    ->where('categoryId', '[0-9]+')
    ->where('newsId', '[0-9]+')
    ->name('categories::news::card');

Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])
    ->name('order');

Route::post('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])
    ->name('order::create');

Route::get('/db', [\App\Http\Controllers\DbController::class, 'index']);

Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::'
], function () {
    Route::get('/', [AdminNewsController::class, 'index'] )
        ->name('index');

    Route::get( '/create',[AdminNewsController::class, 'create'])
        ->name('create');

    Route::post( '/save',[AdminNewsController::class, 'save'])
        ->name('save');

    Route::get('/update/{news}', [AdminNewsController::class, 'update'])
        ->where('news', '[0-9]+')
        ->name('update');

    Route::get('/delete/{id}',[AdminNewsController::class, 'delete'])
        ->where('id', '[0-9]+')
        ->name('delete');
});

Route::group([
    'prefix' => '/admin/categories',
    'as' => 'admin::categories::'
], function () {
    Route::get('/', [AdminCategoryController::class, 'index'] )
        ->name('index');

    Route::get( '/create',[AdminCategoryController::class, 'create'])
        ->name('create');

    Route::post( '/save',[AdminCategoryController::class, 'save'])
        ->name('save');

    Route::get('/update/{category}', [AdminCategoryController::class, 'update'])
        ->where('category', '[0-9]+')
        ->name('update');

    Route::get('/delete/{id}',[AdminCategoryController::class, 'delete'])
        ->where('id', '[0-9]+')
        ->name('delete');
});







