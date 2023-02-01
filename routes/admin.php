<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/login/', [LoginController::class, 'index'])->name('admin.login.page');
Route::post('/login/', [LoginController::class, 'store'])->name('admin.login');
Route::get('/logout/', [LoginController::class, 'logout'])->name('admin.logout')->middleware(['auth:admin']);

Route::group(['middleware' => ['auth:admin']], static function () {

    Route::get('/', [IndexController::class, 'index'])->name('index');

//    Route::resource('virtual-viewer')->name('virtual-viewer');
});
