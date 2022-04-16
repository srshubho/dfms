<?php

use App\Models\Shade;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/shades/add', function () {
    return view('shades.create')->with("message","");
})->name('shades.create');

Route::post('/shades/store', function (Request $request) {
    // ddd($request->all());
    $data = Shade::create($request->all());
    $data->save();
    return view('shades.create')->with("message","Inserted Successfully");

})->name('shades.store');