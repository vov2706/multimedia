<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/login/', [LoginController::class, 'index'])->name('login.page');
Route::post('/login/', [LoginController::class, 'store'])->name('login');
Route::get('/logout/', [LoginController::class, 'logout'])->name('logout')->middleware(['auth:admin']);

Route::group(['middleware' => ['auth:admin']], static function () {

    Route::get('/', IndexController::class)->name('index');

    Route::resource('pages', PageController::class, ['trailingSlashExcept' => 'show'])
        ->only('index', 'edit', 'update', 'destroy');

    Route::resource('images', ImageController::class, ['trailingSlashExcept' => 'show']);
});
