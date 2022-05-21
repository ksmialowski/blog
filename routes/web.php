<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserController;

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
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//Register
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

//Login
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Avatar of User
Route::get('profile', [UserController::class, 'edit'])->middleware('auth');
Route::patch('profile/{user:username}', [UserController::class, 'update'])->middleware('auth');

//Admin Panel
Route::middleware('admin')->group(function () {
Route::resource('admin/posts', AdminPostController::class)->except('show');
});
