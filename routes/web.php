<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('post/list', [HomeController::class, 'getPosts'])->name('posts.list');

// User authentication
Route::get('signup', [UserAuthController::class, 'signup']);
Route::post('registration', [UserAuthController::class, 'registration'])->name('registration.store');
Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::post('user-login', [UserAuthController::class, 'store'])->name('login.store');
Route::post('logout', [UserAuthController::class, 'logout'])->name('logout');


// post

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/post', [PostController::class, 'index'])->name('post.list');
    Route::get('/dashboard/post/create', [PostController::class, 'create']);
    Route::post('post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/dashboard/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
});
