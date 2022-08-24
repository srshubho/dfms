<?php

namespace App\Http\Controllers\Website;

use App\Models\Bull;
use App\Models\Breed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BullController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulls = Bull::paginate(10);
        return view('website.pages.bull.index', compact('bulls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = Breed::all();
        return view('website.pages.bull.create', compact('breeds'));
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
            'name' => 'required|string',
            'breed_id' => 'required|integer',
            'breed_percentage' => 'nullable|numeric',
        ]);

        $bull = new Bull();
        $this->dataStore($request, $bull);

        return redirect()->route('bull.index')->with(['message' => 'Bull created successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bull $bull)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bull $bull)
    {
        $breeds = Breed::all();
        return view('website.pages.bull.edit', compact('bull', 'breeds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bull $bull)
    {
        $dataValidate = $request->validate([
            'name' => 'required|string',
            'breed_id' => 'required|integer',
            'breed_percentage' => 'nullable|numeric',
        ]);
        $this->dataStore($request, $bull);

        return redirect()->route('bull.index')->with(['message' => 'Bull updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bull $bull)
    {
        $bull->delete();
        return redirect()->back()->with(['message' => 'Bull deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $bull)
    {

        $bull->name = $request->name;
        $bull->breed_id = $request->breed_id;
        $bull->breed_percentage = $request->breed_percentage;

        $bull->save();
    }
}
