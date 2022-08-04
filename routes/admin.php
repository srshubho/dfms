<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CowController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ShadeController;
use App\Http\Controllers\Admin\CowTypeCntroller;
use App\Http\Controllers\Admin\SupplierController;


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::name('admin.')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('change-password', [AdminController::class, 'changePassword'])->name('change-password');

        Route::resource('color', ColorController::class);
        Route::resource('cow-type', CowTypeCntroller::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('shade', ShadeController::class);
        Route::resource('cow', CowController::class);
    });
});
