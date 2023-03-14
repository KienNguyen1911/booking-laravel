<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttrController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    return view('client.pages.index');
})->name('index');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/tables', [AdminController::class, 'tables'])->name('tables');
    Route::get('/billing', [AdminController::class, 'billing'])->name('billing');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    Route::resource('attributes', AttrController::class);
});

Route::view('/services', 'client.pages.services')->name('services');
Route::view('/about', 'client.pages.about')->name('about');
Route::view('/contact', 'client.pages.contact')->name('contact');
Route::view('/elements', 'client.pages.elements')->name('elements');
