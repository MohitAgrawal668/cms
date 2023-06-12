<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('post',PostController::class);


Route::get("post/move_to_trash/{post}",[PostController::class, "move_to_trash"])->name("post.move_to_trash");

Route::get("post/trashed/list",[PostController::class, "trashed"])->name("post.trashed");

Route::get("post/restore/{id}",[PostController::class, "restore"])->name("post.restore");
