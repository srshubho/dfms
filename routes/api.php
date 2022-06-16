<?php

use App\Models\Cow;
use App\Models\Supplier;
use App\Models\calf;
use App\Models\Shade;
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
Route::prefix('supplier')->group(function () {

    Route::get('/',function (Request $request){
        
        $data = DB::table('suppliers')->get();
        return response()->json($data);
    });
    Route::get('/{id}',function (Request $request , $id){
    
    $data = DB::table('suppliers')->where('id', '=', $id)->get();
    return response()->json($data);
    });
    Route::post('/',function (Request $request){
    
    $data = Supplier::create($request->all());

    $data->save();
    return response()->json($data);
    });
});
Route::prefix('shade')->group(function () {

    Route::get('/',function (Request $request){
        $data = DB::table('shades')->get();
        return response()->json($data);        
    });
    Route::get('/{id}',function (Request $request , $id){
        
        $data = DB::table('shades')->where('id', '=', $id)->get();
        return response()->json($data);
    });

    Route::get('type',function (Request $request){
        $data = DB::table('shades')->get();
        return response()->json($data); 
    });
    Route::post('/',function (Request $request){
        
        $data = Shade::create($request->all());

        $data->save();
        return response()->json($data);
    });

});
Route::prefix('cow')->group(function () {

    Route::get('/',function (Request $request){
        $data = DB::table('cows')
        ->select("*","cows.id as id")
        ->join('colors', 'cows.cow_color_id', '=', 'colors.id')
        ->join('shades', 'cows.cow_shade_id', '=', 'shades.id')
        ->get();
        return response()->json($data);        
    });
    Route::get('/{id}',function (Request $request , $id){
    
    $data = DB::table('cows')->where('id', '=', $id)->get();
    return response()->json($data);
    });
    Route::post('/',function (Request $request){
    
    $data = Cow::create($request->all());

    $data->save();
    return response()->json($data);
    });
});
Route::prefix('calf')->group(function () {

    Route::get('/',function (Request $request){
        $data = DB::table('calves')
        ->select("*","calves.id as id")
         ->join('colors', 'calves.calf_color_id', '=', 'colors.id')
         ->join('shades', 'calves.calf_shade_id', '=', 'shades.id')
        ->get();
        return response()->json($data);       
    });
    Route::get('/{id}',function (Request $request , $id){
    
        $data = DB::table('calves')
        ->select("*","calves.id as id")
        ->join('colors', 'calves.calf_color_id', '=', 'colors.id')
        ->join('shades', 'calves.calf_shade_id', '=', 'shades.id')
        ->where('calves.id', '=', $id)
        ->get();
        return response()->json($data);
    });
    Route::post('/',function (Request $request){
    
    $data = calf::create($request->all());

    $data->save();
    return response()->json($data);
    });
});

Route::get('/color',function (Request $request){
    
    $data = DB::table('colors')->get();
    return response()->json($data);
});

Route::get('/colorOption',function (Request $request){
    
    $data = DB::table('colors')
    ->select("id","color_name as value")
    ->get();
    return response()->json($data);
});



    Route::get('shade_calf',function (Request $request){
        $data = DB::table('shades')
        ->where('shade_type', '=', 0)
        ->get();
        return response()->json($data); 
    }); 
    Route::get('shade_cow',function (Request $request){
        $data = DB::table('shades')
        ->where('shade_type', '=', 1)
        ->get();
        return response()->json($data); 
    });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
