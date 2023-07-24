<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CurrentExpoController;
use App\Http\Controllers\ExpoController;
use App\Http\Controllers\ExpoStandBulkController;
use App\Http\Controllers\ExpoStandController;
use App\Http\Controllers\StandController;
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
Route::resource('expos',        ExpoController::class)->except(['show']);
Route::resource('stands',       StandController::class)->only(['index']);
Route::resource('expos.stands', ExpoStandController::class)->except(['show']);
Route::resource('current_expos', CurrentExpoController::class)->only(['update', 'destroy']);

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
 * Generic site routes
 */
Route::controller(AppController::class)
    ->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/about', 'about')->name('about');
        // Dummy Route to test by the developer
        Route::get('/dump/{desc?}', 'dump')->name('dump');
    });
