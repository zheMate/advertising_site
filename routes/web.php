<?php


use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\Promo\IndexController as CategoryPromoIndexController;
use App\Http\Controllers\Dashboard\Main\IndexController as DashMainIndexController;
use App\Http\Controllers\Dashboard\Promo\IndexController as DashPromoIndexController;
use App\Http\Controllers\Dashboard\Promo\CreateController as DashPromoCreateController;
use App\Http\Controllers\Dashboard\Promo\DeleteController as DashPromoDeleteController;
use App\Http\Controllers\Dashboard\Promo\EditController as DashPromoEditController;
use App\Http\Controllers\Dashboard\Promo\StoreController as DashPromoStoreController;
use App\Http\Controllers\Dashboard\Promo\UpdateController as DashPromoUpdateController;
use App\Http\Controllers\Dashboard\Promo\ShowController as DashPromoShowController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\RouteAction;
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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, '__invoke']);
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [IndexController::class, '__invoke'])->name('category.index');
        Route::group(['namespace' => 'Promo', 'prefix' => '{category}/promos'], function() {
            Route::get('/', [CategoryPromoIndexController::class, '__invoke'])->name('category.promo.index');
        });
    });
});


Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [DashMainIndexController::class, '__invoke'])->name('dashboard.mainindex');
    });
    Route::group(['namespace' => 'Promo', 'prefix' => 'promo'], function () {
        Route::get('/',  [DashPromoIndexController::class, '__invoke'])->name('dashboard.promo.index');
        Route::get('/create',  [DashPromoCreateController::class, '__invoke'])->name('dashboard.promo.create');
        Route::post('/',  [DashPromoStoreController::class, '__invoke'])->name('dashboard.promo.store');
        Route::get('/{promo}',  [DashPromoShowController::class, '__invoke'])->name('dashboard.promo.show');
        Route::get('/{promo}/edit', [DashPromoEditController::class, '__invoke'])->name('dashboard.promo.edit')->middleware('can:update,promo');
        Route::patch('/{promo}',  [DashPromoUpdateController::class, '__invoke'])->name('dashboard.promo.update')->middleware('can:update,promo');;
        Route::delete('/{promo}', [DashPromoDeleteController::class, '__invoke'])->name('dashboard.promo.delete')->middleware('can:destroy,promo');;
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
