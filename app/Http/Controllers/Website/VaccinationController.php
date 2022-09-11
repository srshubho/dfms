<?php

namespace App\Http\Controllers\Website;

use App\Models\calf;
use App\Models\Vaccine;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class VaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccinations = Vaccination::paginate(10);
        return view('website.pages.vaccination.index', compact('vaccinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calves = calf::all();
        $vaccines = Vaccine::all();
        return view('website.pages.vaccination.create', compact("calves", "vaccines"));
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
            'calf_id' => 'required|integer',
            'vaccine_id' => 'required|integer',
            'date' => 'before:tomorrow'
        ]);

        $vaccination = new Vaccination();
        $this->dataStore($request, $vaccination);

        return redirect()->route('vaccination.index')->with(['message' => 'vaccination created successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccination $vaccination)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccination $vaccination)
    {
        $calves = calf::all();
        $vaccines = Vaccine::all();
        return view('website.pages.vaccination.edit', compact('vaccination', "calves", "vaccines"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccination $vaccination)
    {
        $dataValidate = $request->validate([
            'calf_id' => 'required|integer',
            'vaccine_id' => 'required|integer',
            'date' => 'before:tomorrow'
        ]);

        $this->dataStore($request, $vaccination);

        return redirect()->route('vaccination.index')->with(['message' => 'vaccination updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccination $vaccination)
    {
        $vaccination->delete();
        return redirect()->back()->with(['message' => 'Vaccine deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $vaccination)
    {
        $vaccination->calf_id = $request->calf_id;
        $vaccination->vaccine_id = $request->vaccine_id;
        if ($request->date) {
            $vaccination->date = $request->date;
        } else {
            $vaccination->date = Carbon::today();
        }

        $vaccine = Vaccine::find($request->vaccine_id);
        if ($vaccine) {
            if ($vaccine->subsequent_dose) {
                $vaccine_date = Carbon::createFromFormat('Y-m-d', $request->date);
                $vaccination->next_date = $vaccine_date->addMonth($vaccine->subsequent_dose);
            }
        }

        $count = Vaccination::where([
            ['calf_id', $request->calf_id],
            ['vaccine_id', $request->vaccine_id]
        ])->count();

        $vaccination->vaccine_count = $count + 1;

        $vaccination->save();
    }

    public function nextVaccination()
    {
        $calves = calf::select("id", "name", "date_of_birth")->get();
        $vaccines = Vaccine::all();
        $today = Carbon::today();
        return view('website.pages.vaccination.next-vaccination', compact('calves', 'vaccines', 'today'));
    }
}
