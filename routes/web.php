<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();


Route::resource('/post', 'App\Http\Controllers\PostController');



Route::resource('/blog', 'App\Http\Controllers\BlogController');
Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('home');
Route::get('/prijavashow', [App\Http\Controllers\NalogController::class, 'prijavashow'])->name('prijavashow');
Route::get('/registracijashow', [App\Http\Controllers\NalogController::class, 'registracijashow'])->name('registracijashow');
Route::post('/registracija', [App\Http\Controllers\NalogController::class, 'store'])->name('registracijastore');

Route::get('/profil', [App\Http\Controllers\BlogController::class, 'profil'])->name('profil');
Route::patch('/profilupdate', [App\Http\Controllers\BlogController::class, 'profilupdate'])->name('profilupdate');
