<?php

namespace App\Http\Controllers\Website;

use App\Models\Breed;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines = Vaccine::paginate(10);
        return view('website.pages.vaccine.index', compact('vaccines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.pages.vaccine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $dataValidate = $request->validate([
            'vaccine_name' => 'required|string',
            'age_of_first_dose' => 'nullable|integer',
            'subsequent_dose' => 'nullable|string',
            'booster' => 'nullable|string',
            'repeat' => 'nullable|boolean',
            'remarks' => 'nullable|string',
        ]);

        $vaccine = new Vaccine();
        $this->dataStore($request, $vaccine);

        return redirect()->route('vaccine.index')->with(['message' => 'Vaccine created successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccine $vaccine)
    {
        return view('website.pages.vaccine.edit', compact('vaccine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        $dataValidate = $request->validate([
            'vaccine_name' => 'required|string',
            'age_of_first_dose' => 'nullable|integer',
            'subsequent_dose' => 'nullable|string',
            'booster' => 'nullable|string',
            'repeat' => 'nullable|boolean',
            'remarks' => 'nullable|string',
        ]);

        $this->dataStore($request, $vaccine);

        return redirect()->route('vaccine.index')->with(['message' => 'Vaccine updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();
        return redirect()->back()->with(['message' => 'Vaccine deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $vaccine)
    {
        $vaccine->vaccine_name = $request->vaccine_name;
        $vaccine->age_of_first_dose = $request->age_of_first_dose;
        $vaccine->subsequent_dose = $request->subsequent_dose;
        $vaccine->booster = $request->booster;
        $vaccine->repeat = $request->repeat;
        $vaccine->remarks = $request->remarks;

        $vaccine->save();
    }
}
