<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AllocationController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('dashboard.user');

    Route::get('/item/index', [ItemController::class, 'index'])->name('dashboard.item');
    Route::post('/item/index', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/show/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::get('/item/search', [ItemController::class, 'search'])->name('item.search');

    Route::get('/location/index', [LocationController::class, 'index'])->name('dashboard.location');
    Route::post('/location/index', [LocationController::class, 'store'])->name('location.store');
    Route::get('/location/show/{id}', [LocationController::class, 'show'])->name('location.show');

    Route::get('/allocation', [AllocationController::class, 'index'])->name('dashboard.allocation');
    Route::post('/allocation', [AllocationController::class, 'store'])->name('allocation.store');
});

require __DIR__.'/auth.php';
