<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {

    // ROUTES FOR ONLY ADMIN
    Route::name('admin.')->group(function () {
        Route::resource('user', UserController::class);
    });
});
