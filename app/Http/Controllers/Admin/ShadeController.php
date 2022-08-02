<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shade;
use App\Models\CowType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shades = Shade::all();
        return view('admin.pages.shade.index', compact('shades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cowtypes = CowType::all();
        return view('admin.pages.shade.create', compact('cowtypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'shade_no' => 'required|string|unique:shades',
            'shade_area' => 'required|integer',
            'shade_capacity' => 'required|integer|',
            'shade_type' => 'required|string'
        ]);

        $shade = new Shade();
        $this->dataStore($request, $shade);

        return redirect()->route('admin.shade.index')->with(['message' => 'Shade created successfully!', 'alert-type' => 'success']);
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
    public function edit(Shade $shade)
    {
        $cowtypes = CowType::all();
        return view('admin.pages.shade.edit', compact('shade', 'cowtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shade $shade)
    {
        $dataValidate = $request->validate([
            'shade_no' => 'required|string',
            'shade_area' => 'required|integer',
            'shade_capacity' => 'required|integer|',
            'shade_type' => 'required|string'
        ]);
        $this->dataStore($request, $shade);

        return redirect()->route('admin.shade.index')->with(['message' => 'Shade updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shade $shade)
    {
        $shade->delete();
        return redirect()->back()->with(['message' => 'Shade deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $shade)
    {

        $shade->shade_no = $request->shade_no;
        $shade->shade_area = $request->shade_area;
        $shade->shade_capacity = $request->shade_capacity;
        $shade->shade_type = $request->shade_type;

        $shade->save();
    }
}
