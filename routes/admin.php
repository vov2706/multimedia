<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/login/', [LoginController::class, 'index'])->name('login.page');
Route::post('/login/', [LoginController::class, 'store'])->name('login');
Route::get('/logout/', [LoginController::class, 'logout'])->name('logout')->middleware(['auth:admin']);

Route::group(['middleware' => ['auth:admin']], static function () {

    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::get('/pages/', [PageController::class, 'index'])->name('pages');
});
