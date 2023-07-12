<?php

use App\Http\Controllers\ExpoController;
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



Route::resource('expos', ExpoController::class);
Route::resource('stands', StandController::class);
Route::get('/', [StandController::class, 'standsHome'])->name('stands.home');
Route::post('/', [StandController::class, 'initial_store'])->name('stands.initial');