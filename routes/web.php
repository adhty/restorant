<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
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

    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('create', [MenuController::class, 'create'])->name('create.index');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{Menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{menu}', action: [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
 