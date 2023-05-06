<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    /* Show login page */
    Route::get('/login/', [LoginController::class, 'index'])->name('login.page');

    /* Authenticate user */
    Route::post('/login/', [LoginController::class, 'store'])->name('login');
});

Route::group(['middleware' => ['auth:admin']], static function () {

    /* Logout */
    Route::get('/logout/', [LoginController::class, 'logout'])->name('logout');

    /* ADMIN HOME PAGE */
    Route::get('/', IndexController::class)->name('index');

    /* PAGES */
    Route::resource('pages', PageController::class)->only('index', 'edit', 'update', 'destroy');

    /* IMAGES */
    Route::resource('images', ImageController::class)->only('index', 'store');

    /* VIDEOS */
    Route::get('/videos/show/', [VideoController::class, 'show'])->name('videos.show');
    Route::resource('videos', VideoController::class)->only('index', 'store', 'destroy');
});
