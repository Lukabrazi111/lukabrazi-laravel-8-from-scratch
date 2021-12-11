<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('show');

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store'])->name('posts.store');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin')->name('admin.posts.store');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin')->name('admin.posts.create');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin')->name('admin.posts');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin')->name('admin.posts.edit');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin')->name('admin.posts.update');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin')->name('admin.posts.destroy');
