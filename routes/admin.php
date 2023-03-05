<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/login/', [LoginController::class, 'index'])->name('login.page');
Route::post('/login/', [LoginController::class, 'store'])->name('login');
Route::get('/logout/', [LoginController::class, 'logout'])->name('logout')->middleware(['auth:admin']);

Route::group(['middleware' => ['auth:admin']], static function () {

    /* ADMIN HOME PAGE */
    Route::get('/', IndexController::class)->name('index');

    /* PAGES */
    Route::resource('pages', PageController::class, ['trailingSlashExcept' => 'show'])
        ->only('index', 'edit', 'update', 'destroy');

    /* IMAGES */
    Route::resource('images', ImageController::class, ['trailingSlashExcept' => 'show'])
        ->only('index', 'store');

    /* VIDEOS */
    Route::get('/videos/show/', [VideoController::class, 'show'])->name('videos.show');
    Route::resource('videos', VideoController::class, ['trailingSlashExcept' => 'show'])
        ->only('index', 'store', 'destroy');
});
