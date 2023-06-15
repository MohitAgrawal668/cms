<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [FrontendController::class,'index'])->name("frontend.index");
Route::get('/contact', [FrontendController::class,'contact'])->name("frontend.contact");
Route::get('/show-posts/{category}', [FrontendController::class,'showPost'])->name("frontend.showPost");
Route::get('/show-posts-by-tag/{tag}', [FrontendController::class,'showPostByTag'])->name("frontend.showPostByTag");


Route::get('/postDetail/{post}', [FrontendController::class,'postDetail'])->name("frontend.postDetail");

Route::get("/search", [FrontendController::class, 'search'])->name("frontend.search");

Auth::routes();



Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('category', CategoryController::class);
    Route::resource('post',PostController::class);
    Route::resource('tag', TagController::class);

    Route::get("post/move_to_trash/{post}",[PostController::class, "move_to_trash"])->name("post.move_to_trash");

    Route::get("post/trashed/list",[PostController::class, "trashed"])->name("post.trashed");

    Route::get("post/restore/{id}",[PostController::class, "restore"])->name("post.restore");
});
Route::middleware(['auth','admin'])->group(function(){
    Route::get("user/index",[UserController::class, "index"])->name("user.index");
    Route::get("user/make_admin/{user}",[UserController::class, "make_admin"])->name("user.makeAdmin");
    Route::get("user/edit/{user}",[UserController::class, "edit"])->name("user.edit");
    Route::put("user/update/{user}", [UserController::class, 'update'])->name("user.update");

});
