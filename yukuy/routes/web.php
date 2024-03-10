<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\VideoController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/theme', [ThemeController::class, 'index'])->name('theme.index');
    Route::get('/theme/create', [ThemeController::class, 'create'])->name('theme.create');
    Route::post('/theme/create', [ThemeController::class, 'store'])->name('theme.store');
    Route::get('/theme/{theme}', [ThemeController::class, 'show'])->name('theme.show');
    Route::delete('/theme/{theme}', [ThemeController::class, 'destroy'])->name('theme.destroy');

    Route::get('/invitation/theme-selection', [InvitationController::class, 'create'])->name('invitation.create');

    Route::get('/video', [VideoController::class, 'getVideo']);
});

require __DIR__.'/auth.php';
