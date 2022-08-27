<?php

namespace App\Http\Controllers\Website;

use App\Models\Cow;
use App\Models\Bull;
use App\Models\Insemination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InseminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inseminations = Insemination::paginate(10);
        return view('website.pages.insemination.index', compact('inseminations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cows = Cow::all();
        $bulls = Bull::all();
        return view('website.pages.insemination.create', compact('cows', 'bulls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insemination = new Insemination();
        $this->dataStore($request, $insemination);

        return redirect()->route('insemination.index')->with(['message' => 'Insemination created successfully!', 'alert-type' => 'success']);
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
    public function edit(Insemination $insemination)
    {
        $cows = Cow::all();
        $bulls = Bull::all();
        return view('website.pages.insemination.edit', compact('insemination', 'cows', 'bulls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insemination $insemination)
    {
        $this->dataStore($request, $insemination);

        return redirect()->route('insemination.index')->with(['message' => 'Insemination updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insemination $insemination)
    {
        $insemination->delete();
        return redirect()->back()->with(['message' => 'Insemination deleted successfully!', 'alert-type' => 'warning']);
    }

    public function dataStore($request, $insemination)
    {
        $dataValidate = $request->validate([
            'cow_id' => 'required|numeric',
            'bull_id' => 'required|numeric',
            'insemination_date' => 'required|date',
        ]);

        // $insemination->insemination_id = 1;
        $insemination->cow_id = $request->cow_id;
        $insemination->bull_id = $request->bull_id;
        $insemination->insemination_date = $request->insemination_date;

        $insemination->save();
    }
}
