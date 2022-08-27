<?php

namespace App\Http\Controllers\Website;

use App\Models\Cow;
use App\Models\calf;
use App\Models\Color;
use App\Models\Shade;
use App\Models\Insemination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CalfController extends

Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calfs = calf::paginate(10);
        return view('website.pages.calf.index', compact('calfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        $shades = Shade::all();
        $inseminations = Insemination::all();
        return view('website.pages.calf.create', compact('colors', 'shades', 'inseminations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calf = new calf();
        $this->dataStore($request, $calf);

        return redirect()->route('calf.index')->with(['message' => 'Calf created successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(calf $calf)
    {
        return view('website.pages.calf.show', compact('calf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(calf $calf)
    {
        $colors = Color::all();
        $shades = Shade::all();
        return view('website.pages.calf.edit', compact('calf', 'colors', 'shades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calf $calf)
    {
        $this->dataStore($request, $calf);

        return redirect()->route('calf.index')->with(['message' => 'Calf updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(calf $calf)
    {
        $calf->delete();
        return redirect()->back()->with(['message' => 'Calf deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $calf)
    {
        $dataValidate = $request->validate([
            'name' => 'required|string',
            'primary_image' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'estimated_live_weight' => 'nullable',
            'gender' => 'required|',
            'calf_breed_percentage' => 'nullable|integer',
            'color_id' => 'nullable|numeric',
            'shade_id' => 'nullable|numeric',
            'insemination_id' => 'nullable|numeric'
        ]);

        $calf->name = $request->name;

        if ($request->hasFile('primary_image')) {
            $primary_imageUrl = $request->primary_image->store('public/calf');
            $calf->primary_image = Storage::url($primary_imageUrl);
        }
        $calf->date_of_birth = $request->date_of_birth;
        $calf->estimated_live_weight = $request->estimated_live_weight;
        $calf->gender = $request->gender;
        $calf->breed_percentage = $request->breed_percentage;
        $calf->color_id = $request->color_id;
        $calf->shade_id = $request->shade_id;
        $calf->insemination_id = $request->insemination_id;

        $calf->save();

        // $calf_Id = $calf->id;

        // if ($request->hasFile('cow_images')) {
        //     $images = request()->file('cow_images');
        //     foreach ($images as $image) {
        //         $imageModel = new CowImage();
        //         $imageUrl = $image->storeAs('public/cow/images', $image->getClientOriginalName());
        //         $imageModel->cow_Id = $cow_Id;
        //         $imageModel->image = Storage::url($imageUrl);
        //         $imageModel->save();
        //     }
        // }
    }
}
