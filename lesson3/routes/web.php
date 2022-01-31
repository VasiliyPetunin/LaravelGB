<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::view('/about', 'about')->name('about');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{id}', [NewsController::class, 'show'])->where('id', '^[0-9]+$')->name('oneNews');
        Route::get('/add', [NewsController::class, 'addNews'])->name('addNews');
    });

Route::name('categories.')
    ->prefix('categories')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categoriesIndex');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('newsByCategory');
    });

Route::view('welcome', 'welcome')->name('laravelHomepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
