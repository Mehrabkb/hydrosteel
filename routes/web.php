<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/' , [\App\Http\Controllers\CustomerController::class , 'factorViewer']);
Route::get('/factor/search' ,[\App\Http\Controllers\CustomerController::class , 'factorViewer'])->name('factor.search');
Route::post('/factor/search' ,[\App\Http\Controllers\CustomerController::class , 'factorViewer'])->name('factor.search');
Route::get('/user/login' , [\App\Http\Controllers\UserController::class , 'userLogin'])->name('user.login');
Route::post('/user/login' , [\App\Http\Controllers\UserController::class , 'userLogin'])->name('user.login');

Route::prefix('admin')->group(function () {
    Route::get('/home', [\App\Http\Controllers\AdminController::class , 'home'])->name('admin.home');
    Route::get('/factor' , [\App\Http\Controllers\AdminController::class , 'factor'])->name('admin.factor');
    Route::POST('/factor/add' , [\App\Http\Controllers\AdminController::class , 'addFactor'])->name('admin.add.factor');
    Route::get('/factor/show/{id}' , [\App\Http\Controllers\AdminController::class , 'showFactor'])->name('admin.show.factor');
    Route::post('/factor/edit/factorItem' , [\App\Http\Controllers\AdminController::class , 'editFactorItem'])->name('admin.edit.factorItem');
    Route::get('/product' ,[\App\Http\Controllers\AdminController::class , 'product'])->name('admin.product');
    Route::get('/step' , [\App\Http\Controllers\AdminController::class , 'step'])->name('admin.step');
    Route::post('/step/add' , [\App\Http\Controllers\AdminController::class , 'addStep'])->name('admin.add.step');
    Route::post('/step/remove' , [\App\Http\Controllers\AdminController::class , 'removeStep'])->name('admin.remove.step');
    Route::post('/step/single' , [\App\Http\Controllers\AdminController::class , 'singleStep'])->name('admin.single.step');
    Route::post('/step/edit' , [\App\Http\Controllers\AdminController::class , 'editStep'])->name('admin.edit.step');
    Route::get('/user/logout' , [\App\Http\Controllers\AdminController::class , 'adminLogout'])->name('admin.logout');
});
