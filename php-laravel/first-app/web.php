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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
//'URI',[Controller Name , Func Name]
Route::get('/create',[\App\Http\Controllers\HomeController::class,'create'])->name('create');
Route::post('/store',[\App\Http\Controllers\HomeController::class,'store'])->name('store');
Route::get('/edit/{id}',[\App\Http\Controllers\HomeController::class,'edit'])->name('edit');
Route::put('/update/{id}',[\App\Http\Controllers\HomeController::class,'update'])->name('update');
Route::delete('/delete/{id}',[\App\Http\Controllers\HomeController::class,'delete'])->name('delete');
