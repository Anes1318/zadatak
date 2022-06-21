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

Route::get('/logout', function () {
    return redirect('/logout');
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('/postadmin', 'App\Http\Controllers\AdminPostsController');
    Route::resource('/useradmin', 'App\Http\Controllers\AdminUsersController');
    Route::get('/admin', [App\Http\Controllers\BlogController::class, 'admin'])->name('admin');

});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/uklonisliku/{slug}', [App\Http\Controllers\AdminUsersController::class, 'uklonisliku'])->name('uklonisliku');
    Route::get('/profiledit', [App\Http\Controllers\BlogController::class, 'profiledit'])->name('profiledit');
    Route::patch('/profilupdate', [App\Http\Controllers\BlogController::class, 'profilupdate'])->name('profilupdate');
    Route::post('/posaljimail', [App\Http\Controllers\BlogController::class, 'posaljimail'])->name('posaljimail');
    Route::get('/contact', [App\Http\Controllers\BlogController::class, 'kontakt'])->name('kontakt');

    // Route::post('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    // Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    // Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    // Route::patch('/post/{slug}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    // Route::delete('/post/{slug}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    // Route::get('/post/{slug}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    
    Route::resource('/post', 'App\Http\Controllers\PostController');
});
Route::get('/profil/{slug}', [App\Http\Controllers\BlogController::class, 'profil'])->name('profil');
// Route::get('/post/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');




Route::resource('/blog', 'App\Http\Controllers\BlogController');
Route::get('/guestpost/{slug}', [App\Http\Controllers\BlogController::class, 'guestpost'])->name('guestpost');
Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('home');







