<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CowType;
use Illuminate\Http\Request;

class CowTypeCntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cowtypes = CowType::paginate(10);
        return view('website.pages.cowtype.index', compact('cowtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.pages.cowtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cowtype = new CowType();
        $this->dataStore($request, $cowtype);

        return redirect()->route('cow-type.index')->with(['message' => 'Cowtype created successfully!', 'alert-type' => 'success']);
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
    public function edit(CowType $cowType)
    {
        return view('website.pages.cowtype.edit', compact('cowType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CowType $cowType)
    {
        $this->dataStore($request, $cowType);

        return redirect()->route('cow-type.index')->with(['message' => 'Cowtype updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CowType $cowType)
    {
        $cowType->delete();
        return redirect()->back()->with(['message' => 'CowType deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $cowType)
    {
        $dataValidate = $request->validate([
            'type_name' => 'required|string|unique:cow_types',
        ]);

        $cowType->type_name = $request->type_name;

        $cowType->save();
    }
}
