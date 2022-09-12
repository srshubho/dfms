<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Staff\FeedController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BreedController;
use App\Http\Controllers\Website\CowController;
use App\Http\Controllers\Website\BullController;
use App\Http\Controllers\Website\CalfController;
use App\Http\Controllers\Website\ColorController;
use App\Http\Controllers\Website\ShadeController;
use App\Http\Controllers\Website\CowTypeCntroller;
use App\Http\Controllers\Website\VaccineController;
use App\Http\Controllers\Website\SettingsController;
use App\Http\Controllers\Website\SupplierController;
use App\Http\Controllers\Website\VaccinationController;
use App\Http\Controllers\Website\InseminationController;
use App\Http\Controllers\Admin\AssignCowToStaffController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::group(['middleware' => ['is_admin']], function () {
        Route::resource('user', UserController::class);
    });

    // COMMON ROUTES
    Route::group(['middleware' => ['is_admin_or_manager']], function () {
        Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
        Route::post('change-password', [SettingsController::class, 'changePassword'])->name('change-password');

        Route::resource('breed', BreedController::class);
        Route::resource('feeditem', ItemController::class);
        Route::post('feedunit', [ItemController::class, 'feedunit'])->name("feedunit");
        Route::resource('color', ColorController::class);
        Route::resource('cow-type', CowTypeCntroller::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('shade', ShadeController::class);
        Route::resource('bull', BullController::class);
        Route::resource('calf', CalfController::class);
        Route::resource('cow', CowController::class);
        Route::delete('delete-image/{cowImage}', [CowController::class, 'deleteImage'])->name("deleteImage");;
        Route::resource('insemination', InseminationController::class);
        Route::resource('vaccine', VaccineController::class);
        Route::resource('vaccination', VaccinationController::class);
        Route::get('next-vaccination', [VaccinationController::class, 'nextVaccination'])->name("nextVaccination");
        Route::resource('assign-cow-to-staff', AssignCowToStaffController::class);
        Route::post('assign-task/{assign_task}', [AssignCowToStaffController::class, 'assigntask'])->name('assigntask');
    });

    // Route::name('admin.')->group(function () {
    // });

    Route::group(['middleware' => ['is_staff']], function () {
        Route::get('feed', [FeedController::class, 'index'])->name("feed.index");
        Route::get('feed-data/{assigned}/{type}/table/{table}/id/{cow_id}/{date}', [FeedController::class, 'feedData'])->name("feedData");
        Route::post('feed-data/{assigned}/{type}/table/{table}/id/{cow_id}', [FeedController::class, 'saveFeedData'])->name("feedData.store");
        Route::get('changeBathStatus', [FeedController::class, 'changeBathStatus']);
    });
});
