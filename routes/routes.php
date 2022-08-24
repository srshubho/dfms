<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BreedController;
use App\Http\Controllers\Website\CowController;
use App\Http\Controllers\Website\BullController;
use App\Http\Controllers\Website\CalfController;
use App\Http\Controllers\Website\ColorController;
use App\Http\Controllers\Website\ShadeController;
use App\Http\Controllers\Website\CowTypeCntroller;
use App\Http\Controllers\Website\SettingsController;
use App\Http\Controllers\Website\SupplierController;
use App\Http\Controllers\Admin\AssignCowToStaffController;

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['is_admin']], function () {
        Route::resource('user', UserController::class);
    });

    // COMMON ROUTES
    Route::group(['middleware' => ['is_admin_or_manager']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
        Route::post('change-password', [SettingsController::class, 'changePassword'])->name('change-password');

        Route::resource('breed', BreedController::class);
        Route::resource('color', ColorController::class);
        Route::resource('cow-type', CowTypeCntroller::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('shade', ShadeController::class);
        Route::resource('bull', BullController::class);
        Route::resource('calf', CalfController::class);
        Route::resource('cow', CowController::class);
        Route::resource('assign-cow-to-staff', AssignCowToStaffController::class);
    });

    // Route::name('admin.')->group(function () {
    // });
});
