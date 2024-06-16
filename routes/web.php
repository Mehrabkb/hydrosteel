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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/home', [\App\Http\Controllers\AdminController::class , 'home'])->name('admin.home');
    Route::get('/factor' , [\App\Http\Controllers\AdminController::class , 'factor'])->name('admin.factor');
    Route::get('/product' ,[\App\Http\Controllers\AdminController::class , 'product'])->name('admin.product');
    Route::get('/step' , [\App\Http\Controllers\AdminController::class , 'step'])->name('admin.step');
    Route::post('/step/add' , [\App\Http\Controllers\AdminController::class , 'addStep'])->name('admin.add.step');
    Route::post('/step/remove' , [\App\Http\Controllers\AdminController::class , 'removeStep'])->name('admin.remove.step');
});
