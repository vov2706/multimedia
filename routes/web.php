<?php

use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\ImageController;
use App\Http\Controllers\Site\IndexController;
use App\Http\Controllers\Site\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('locale', 'ua|en');

Route::prefix('/{locale?}')->group(function () {

    /* ABOUT */
    Route::get('/about/', AboutController::class)->name('about');

    /* IMAGES */
    Route::get('/virtual-studio/', ImageController::class)->name('virtual-studio');

    /* VIDEOS */
    Route::get('/virtual-viewers-zone/', VideoController::class)->name('virtual-viewers-zone');

    /* GAMES */
    Route::get('/games/', ImageController::class)->name('games');

    /* HOME */
    Route::get('/', IndexController::class)->name('home');
});

Route::fallback(fn () => abort(404));
