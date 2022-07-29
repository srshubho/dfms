<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Auth::logout();
    // return redirect()->route('login');
    if (auth()->user()->user_type == 1) {
        return redirect()->route('admin.dashboard');
    }
})->middleware(['auth'])->name('/');

require __DIR__ . '/auth.php';
