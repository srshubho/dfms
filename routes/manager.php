<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'manager', 'middleware' => ['auth', 'is_manager']], function () {

    // ROUTES FOR ONLY ADMIN
    Route::name('manager.')->group(function () {
        Route::resource('user', UserController::class);
    });
});
