<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttrController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MotelController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteRegistrar;
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



Route::middleware('auth.admin')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/tables', [AdminController::class, 'tables'])->name('tables');
        Route::get('/billing', [AdminController::class, 'billing'])->name('billing');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

        Route::resource('attributes', AttrController::class);
        Route::resource('motels', MotelController::class);
        Route::post('/search', [MotelController::class, 'search'])->name('motels.search');
    });
});

Route::view('/services', 'client.pages.services')->name('services');
Route::view('/about', 'client.pages.about')->name('about');
Route::view('/contact', 'client.pages.contact')->name('contact');
Route::view('/elements', 'client.pages.elements')->name('elements');

Route::get('/province', [AddressController::class, 'getProvince'])->name('province');
Route::post('/district', [AddressController::class, 'getDistrict'])->name('district');
Route::post('/ward', [AddressController::class, 'getWard'])->name('ward');
