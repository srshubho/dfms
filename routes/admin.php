<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::name('admin.')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::resource('color', ColorController::class);
    });
});
