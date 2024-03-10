<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\DashboardController;
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
    return view('/auth/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/index', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::delete('/user/show/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        
    Route::get('/item/index', [ItemController::class, 'index'])->name('item.index');
    Route::post('/item/index', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/show/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::get('/item/search', [ItemController::class, 'search'])->name('item.search');
    Route::delete('/item/show/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/location/index', [LocationController::class, 'index'])->name('location.index');
    Route::post('/location/index', [LocationController::class, 'store'])->name('location.store');
    Route::get('/location/show/{id}', [LocationController::class, 'show'])->name('location.show');

    Route::get('/allocation/index', [AllocationController::class, 'index'])->name('allocation.index');
    Route::post('/allocation/index', [AllocationController::class, 'store'])->name('allocation.store');
    Route::get('/allocation/show/{id}', [AllocationController::class, 'show'])->name('allocation.show');
    Route::put('/allocation/update/{id}', [AllocationController::class, 'update'])->name('allocation.update');
});

require __DIR__.'/auth.php';
