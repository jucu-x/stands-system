<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ExpoController;
use App\Http\Controllers\ExpoStandController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\InstitutionController;
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

/**
 * Resource Routes for all the implicated resource controllers
 */
Route::resources([
    'expos' => ExpoController::class,
    'stands' => StandController::class,
    'expos.stands' => ExpoStandController::class,
    //'institutions' => InstitutionController::class,
    // 'stands' => StandRequestController::class,
    // 'stands' => AnonymousStandRequestController::class,
    // 'stands' => InstitutionStandRequestController::class,
    // 'stands' => RentalController::class,

]);

/**
 * Stand routes
 */
Route::controller(StandController::class)
    ->name('stands.')
    ->prefix('stands')
    ->group(function () {
        Route::get('/bulk/{expo}', 'bulkCreate')->name('bulk-create');
        Route::delete('/destroy-all/{expo}', 'destroyAllInExpo')->name('destroy-all-in-expo');
        Route::post('/bulk', 'bulkStore')->name('bulk-store');
    });

/**
 * Generic site routes
 */
Route::controller(AppController::class)
    ->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/about', 'about')->name('about');
        // Dummy Route to test by the developer
        Route::get('/dump/{desc?}', 'dump')->name('dump');
    });
