<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
Route::post('/user/index', [UserController::class, 'store'])->name('user.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/guest/index', [GuestController::class, 'index'])->name('guest.index');
Route::post('/guest/index', [GuestController::class, 'store'])->name('guest.store');
Route::put('/guest/{id}', [GuestController::class, 'update'])->name('guest.update');
Route::delete('/guest/{id}', [GuestController::class, 'destroy'])->name('guest.destroy');

Route::get('/room/index', [RoomController::class, 'index'])->name('room.index');
Route::post('/room/index', [RoomController::class, 'store'])->name('room.store');
Route::put('/room/{id}', [RoomController::class, 'update'])->name('room.update');
Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('room.destroy');

Route::get('/payment/index', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment/index', [PaymentController::class, 'store'])->name('payment.store');
Route::delete('/payment/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');

Route::get('/activity/index', [ActivityController::class, 'index'])->name('activity.index');
Route::post('/activity/index', [ActivityController::class, 'store'])->name('activity.store');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    // Rute login
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::post('/login', [LoginController::class,'login'])->name('login.post');
    Route::get('/register', [LoginController::class,'register'])->name('register');
    Route::post('/register', [UserController::class,'store'])->name('register.post');
});