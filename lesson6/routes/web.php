<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');


Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{news}', [NewsController::class, 'show'])->name('one');
        Route::name('category.')
            ->group(function () {
                Route::get('/categories', [CategoryController::class, 'index'])->name('index');
                Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
            });

    });


Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/test1', [AdminNewsController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminNewsController::class, 'test2'])->name('test2');
        Route::get('/crud/news', [AdminNewsController::class, 'index'])->name('crudNews');
        Route::match(['get', 'post'],'/create', [AdminNewsController::class, 'create'])->name('create');
        Route::match(['put', 'post'],'/update/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/delete/{news}', [AdminNewsController::class, 'destroy'])->name('delete');

    });



Route::view('/about', 'about')->name('about');

Auth::routes();

