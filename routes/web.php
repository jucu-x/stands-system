<?php

use App\Http\Controllers\AnonymousStandRequestController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CurrentExpoController;
use App\Http\Controllers\ExpoController;
use App\Http\Controllers\ExpoStandBulkController;
use App\Http\Controllers\ExpoStandController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\StandRequestController;
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

Route::middleware('auth')->group(function () {
    /**
     * Resource Routes for all the implicated resource controllers
     */
    Route::resource('expos',        ExpoController::class)->except(['show']);
    Route::resource('stands',       StandController::class)->only(['index']);
    Route::patch('expos/{expo}/stands/{stand}/toggle_availability', [ExpoStandController::class, 'toggleAvailability'])->name('expos.stands.toggle_availability');
    Route::resource('expos.stands', ExpoStandController::class)->except(['show']);
    Route::resource('current_expos', CurrentExpoController::class)->only(['update', 'destroy']);

    Route::resource('stands.stand_requests', StandRequestController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::resource('stand_requests', StandRequestController::class)->only(['show', 'create']);

    /**
     * Bulk operations routes for stands in Expo
     */
    Route::controller(ExpoStandBulkController::class)
        ->name('expos.stands.bulk.')
        ->prefix('expos/{expo}/stands/bulk')
        ->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::delete('/', 'destroy')->name('destroy');
        });

    /**
     * Profile Routes
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('stands.anonymous_stand_requests', AnonymousStandRequestController::class)->only(['create', 'store']);
/**
 * Generic site routes accessible by everyone
 */
Route::controller(AppController::class)
    ->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/about', 'about')->name('about');
        // Dummy Route to test by the developer
        Route::get('/dump/{desc?}', 'dump')->name('dump');
    });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
