<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;

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
Route::get('register', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
});

Route::get('dashboard', function() {
    return view('dashboard');
});

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [AuthenticationController::class, 'login']);
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::post('register', [AuthenticationController::class, 'register'])->name('register');
Route::resource('posts', PostController::class);