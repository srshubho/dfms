<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cow;
use App\Models\Color;
use App\Models\Shade;
use App\Models\CowType;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cows = Cow::all();
        return view('admin.pages.cow.index', compact('cows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        $suppliers = Supplier::all();
        $cowTypes = CowType::all();
        $shades = Shade::all();
        return view('admin.pages.cow.create', compact('colors', 'suppliers', 'cowTypes', 'shades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cow = new Cow();
        $this->dataStore($request, $cow);

        return redirect()->route('admin.cow.index')->with(['message' => 'Cow created successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cow $cow)
    {
        $colors = Color::all();
        $suppliers = Supplier::all();
        $cowTypes = CowType::all();
        $shades = Shade::all();
        return view('admin.pages.cow.edit', compact('cow', 'colors', 'suppliers', 'cowTypes', 'shades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cow $cow)
    {
        $this->dataStore($request, $cow);

        return redirect()->route('admin.cow.index')->with(['message' => 'Cow updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cow $cow)
    {
        $cow->delete();
        return redirect()->back()->with(['message' => 'Cow deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $cow)
    {
        $dataValidate = $request->validate([
            'cow_name' => 'nullable|string',
            'cow_date_of_purchased' => 'nullable|date',
            'cow_date_of_production' => 'nullable|date',
            'cow_date_of_birth' => 'nullable|date',
            'cow_gender' => 'required|',
            'cow_estimated_live_weight' => 'nullable|integer',
            'cow_transaction_cost' => 'nullable|integer',
            'cow_labour_cost' => 'nullable|integer',
            'cow_status_type' => 'required|string',
            'cow_color_id' => 'nullable|string',
            'cow_supplier_id' => 'nullable|string',
            'cow_type_id' => 'nullable|string',
            'cow_shade_id' => 'nullable|string',
        ]);

        $cow->cow_name = $request->cow_name;
        $cow->cow_date_of_purchased = $request->cow_date_of_purchased;
        $cow->cow_date_of_production = $request->cow_date_of_production;
        $cow->cow_date_of_birth = $request->cow_date_of_birth;
        $cow->cow_gender = $request->cow_gender;
        $cow->cow_estimated_live_weight = $request->cow_estimated_live_weight;
        $cow->cow_transaction_cost = $request->cow_transaction_cost;
        $cow->cow_labour_cost = $request->cow_labour_cost;
        $cow->cow_status_type = $request->cow_status_type;
        $cow->cow_color_id = $request->cow_color_id;
        $cow->cow_supplier_id = $request->cow_supplier_id;
        $cow->cow_type_id = $request->cow_type_id;
        $cow->cow_shade_id = $request->cow_shade_id;

        $cow->save();
    }
}
