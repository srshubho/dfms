<?php

use App\Models\Cow;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/supplier',function (Request $request){
    
    $data = DB::table('suppliers')->get();
    return response()->json($data);
});
Route::get('/cow',function (Request $request){
    
    $data = Cow::all();
    return response()->json($data);
});
Route::get('/color',function (Request $request){
    
    $data = DB::table('colors')->get();
    return response()->json($data);
});
Route::get('/calves',function (Request $request){
    
    $data = DB::table('calves')->get();
    return response()->json($data);
});
Route::get('/calves/{id}',function (Request $request , $id){
    
    $data = DB::table('calves')->where('id', '=', $id)->get();
    return response()->json($data);
});
Route::post('/supplier',function (Request $request){
    
    $data = new Supplier;
    $data->name = $request->name;
    $data->phone = $request->phone;
    $data->address = $request->address;
    $data->save();
    return response()->json($data);
});
Route::post('/cow',function (Request $request){
    $data = Cow::create($request->all());
    // $data = new Cow();
    // $data->name = $request->name;
    // $data->color_id = $request->color_id;
    // $data->estimated_live_weight = $request->estimated_live_weight;
    // $data->inhouse_or_purchased = $request->inhouse_or_purchased;
    $data->save();
    return response()->json($data);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
