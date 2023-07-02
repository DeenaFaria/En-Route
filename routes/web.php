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
    return view('welcome_my_version');
});
Route::resource('posts', 'App\Http\Controllers\PostController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');
Route::put('/blog/{id}/edit', [App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');

Route::post('/blog', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::delete('/blog/{id}', [App\Http\Controllers\BlogController::class,'destroy'])->name('blog.destroy');



