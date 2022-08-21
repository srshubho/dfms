<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Auth::logout();
    // return redirect()->route('login');
    // if (auth()->user()->user_type == 1) {
    return redirect()->route('dashboard');
    // }
})->middleware(['auth'])->name('/');

Route::get('alert', function(){
    return view("website.pages.alert");
});

require __DIR__ . '/auth.php';
