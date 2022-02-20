<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\UserController as UserController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\SocialController as SocialController;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])
    ->name('main');

Route::get('/locale/{locale}', [\App\Http\Controllers\LocaleController::class, 'index'])
    ->where('locale','\w+')
    ->name('locale');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])
    ->name('categories');

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

Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => '/profiles',
    'as' => 'profiles::',
    'middleware' => ['auth']
], function () {
    Route::post( '/save',[UserController::class, 'save'])
        ->name('save');

    Route::get('/update',[UserController::class, 'update'])
        ->name('update');
});

//Админка

Route::middleware(['auth', 'rights.restrict'])->prefix('admin')->group(function(){
    Route::group([
        'prefix' => '/categories',
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

    Route::group([
        'prefix' => '/news',
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
        'prefix' => '/profiles',
        'as' => 'admin::profiles::'
    ], function () {
        Route::get('/', [AdminUserController::class, 'index'] )
            ->name('index');

        Route::get( '/create',[AdminUserController::class, 'create'])
            ->name('create');

        Route::post( '/save',[AdminUserController::class, 'save'])
            ->name('save');

        Route::get('/update',[AdminUserController::class, 'update'])
            ->name('update');

        Route::get('/delete/{id}',[AdminUserController::class, 'delete'])
            ->where('id', '[0-9]+')
            ->name('delete');
    });

    Route::group([
        'prefix' => '/parser',
        'as' => 'admin::parser::'
    ], function () {
        Route::get('/', [AdminParserController::class, 'index'] )
            ->name('index');

    });

});

Route::group([
    'prefix' => '/social',
    'as' => 'social::'
], function () {
    Route::get('/login', [SocialController::class, 'loginVK'] )
        ->name('login-vk');
    Route::get('/response', [SocialController::class, 'responseVK'] )
        ->name('response-vk');
});
