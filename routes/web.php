<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAuthController;
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
    return view('layouts.app');
});
// User authentication
Route::get('signup', [UserAuthController::class, 'signup']);
Route::post('registration', [UserAuthController::class, 'registration'])->name('registration.store');
Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::post('user-login', [UserAuthController::class, 'loginStore'])->name('login.store');

// dashboard
Route::get('/dashboard',[DashboardController::class, 'dashboard']);
Route::get('/dashboard/profile',[DashboardController::class, 'profile']);

// post
Route::get('/all_post', [PostController::class, 'index']);

