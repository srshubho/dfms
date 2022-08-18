<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Auth::logout();
    // return redirect()->route('login');
    if (auth()->user()->user_type == 1) {
        return redirect()->route('dashboard');
    }
})->middleware(['auth'])->name('/');

require __DIR__ . '/auth.php';
