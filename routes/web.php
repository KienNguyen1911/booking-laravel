<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttrController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MotelController;
use App\Http\Controllers\OrderController;
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
Route::middleware('checkLogin')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth.admin')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/tables', [AdminController::class, 'tables'])->name('tables');
        Route::get('/billing', [AdminController::class, 'billing'])->name('billing');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

        Route::resource('attributes', AttrController::class);
        Route::get('/attributes-table', [AttrController::class, 'getData'])->name('attributes.getData');
        Route::resource('motels', MotelController::class);
        Route::resource('images', ImageController::class);
        Route::post('/images/upload', [ImageController::class, 'addImageMotel'])->name('images.upload');

        Route::get('/search', [MotelController::class, 'search'])->name('motels.search');
        Route::get('/orders', [OrderController::class, 'getAllOrder'])->name('orders.all');
        Route::get('/orders/user/{id}', [OrderController::class, 'getOrderByOwner'])->name('orders.user');
    });
});

Route::view('/services', 'client.pages.services')->name('services');
Route::view('/about', 'client.pages.about')->name('about');
Route::view('/contact', 'client.pages.contact')->name('contact');
Route::view('/elements', 'client.pages.elements')->name('elements');
Route::get('/motels', [MotelController::class, 'motelClient'])->name('motels');
Route::get('/motel/{id}', [MotelController::class, 'showMotelClient'])->name('motels.show.client');
Route::get('/search', [MotelController::class, 'searchMotelClient'])->name('motels.search.client');

Route::resource('booking', BookingController::class);
Route::resource('order', OrderController::class);
Route::post('/postVNPay', [OrderController::class, 'postVNPay'])->name('postVNPay');
Route::get('/vnpayReturn', [OrderController::class, 'vnpayReturn'])->name('vnpayReturn');

Route::get('/province', [AddressController::class, 'getProvince'])->name('province');
Route::post('/district', [AddressController::class, 'getDistrict'])->name('district');
Route::post('/ward', [AddressController::class, 'getWard'])->name('ward');
