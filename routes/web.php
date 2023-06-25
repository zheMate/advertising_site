<?php

use App\Http\Controllers\Dashboard\Main\IndexController as MainIndexController;
use App\Http\Controllers\Main\IndexController;
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

Route::group(['namespace' => 'Main'], function() {
    Route::get('/', [IndexController::class, '__invoke']);
});


Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard', 'middleware' => ['auth','verified']], function() {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [MainIndexController::class, '__invoke'])->name('dashboard.mainindex');
    });
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
