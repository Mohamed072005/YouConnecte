<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use APP\Http\Controllers\PusherController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\FollowController;
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

Route::get('/', function () {
    return view('login');
})->name('to.login');
Route::get('/search', [PostController::class, 'search']);

Route::post('/user/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'index'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/share/post', [PostController::class, 'store'])->name('share.post');

Route::get('/home', [PostController::class, 'getPosts'])->name('home');
Route::get('/profil', [PostController::class, 'getUserPosts'])->name('profil');
Route::delete('/profil/delete', [PostController::class, 'deleteAccount'])->name('deleteAccount');




Route::put('/profil/update/{id}', [PostController::class, 'updateinfo'])->name('profil.update');

Route::delete('/delete/post/{id}', [PostController::class, 'destroy'])->name('delete.post');
Route::get('/edit/info/{id}', [PostController::class, 'edit'])->name('edit.post');
Route::put('/update/post/{id}', [PostController::class, 'update'])->name('update.post');
Route::post('/addpost', [PostController::class, 'addNewPost'])->name('add.post');
Route::get('/addpost', [PostController::class, 'addPostView'])->name('addpost');





Route::get('/comments/{id}', [CommentController::class, 'getComments'])->name('get.comments');
Route::post('/create/comments', [CommentController::class, 'store'])->name('store.comment');
Route::get('/profil', [PostController::class, 'getUserPosts'])->name('profil');

Route::post('/like/{id}', [LikeController::class, 'store'])->name('like.action');

Route::post('follow', [FollowController::class, 'store'])->name('store.follow');



