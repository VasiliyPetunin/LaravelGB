<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController as ProfileController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
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
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{news}', [NewsController::class, 'show'])->name('one');
        Route::name('category.')
            ->group(function () {
                Route::get('/categories', [CategoryController::class, 'index'])->name('index');
                Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
            });

    });

Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->middleware('auth')->name('updateProfile');
Route::view('/updatedSuccessfully', 'users.updatedSuccessfully')->name('profileUpdated');
Route::view('/accessError', 'accessError')->name('accessDenied');

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/test1', [AdminNewsController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminNewsController::class, 'test2'])->name('test2');
        Route::view('/updatedSuccessfully', 'admin.updatedSuccessfully')->name('profileUpdated');
        Route::get('/crud/news', [AdminNewsController::class, 'index'])->name('crudNews');
        Route::get('/crud/users', [AdminProfileController::class, 'index'])->name('crudUsers');
        Route::match(['get', 'post'],'/create', [AdminNewsController::class, 'create'])->name('create');
        Route::match(['put', 'get'],'/update/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/delete/{news}', [AdminNewsController::class, 'destroy'])->name('delete');
        Route::put('profile/changeAdminRights/{user}', [AdminProfileController::class, 'changeAdminRights'])->name('changeAdminRights');
        Route::view('profile/youAreAdmin', 'admin.youAreAdmin')->name('youAreAdmin');
        Route::match(['get', 'put'], '/profile/update/{user}', [AdminProfileController::class, 'update'])->name('updateProfile');
        Route::delete('/profile/delete/{user}', [AdminProfileController::class, 'destroy'])->name('deleteProfile');

    });



Route::view('/about', 'about')->name('about');

Auth::routes();

