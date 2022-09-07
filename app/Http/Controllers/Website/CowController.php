<?php

namespace App\Http\Controllers\Website;

use App\Models\Cow;
use App\Models\Color;
use App\Models\Shade;
use App\Models\CowType;
use App\Models\CowImage;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cows = Cow::paginate(10);
        return view('website.pages.cow.index', compact('cows'));
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
        $shades = Shade::all();
        return view('website.pages.cow.create', compact('colors', 'suppliers', 'shades'));
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

        return redirect()->route('cow.index')->with(['message' => 'Cow created successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cow $cow)
    {
        return view('website.pages.cow.show', compact('cow'));
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
        $shades = Shade::all();
        return view('website.pages.cow.edit', compact('cow', 'colors', 'suppliers', 'shades'));
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

        return redirect()->route('cow.index')->with(['message' => 'Cow updated successfully!', 'alert-type' => 'success']);
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
            'name' => 'nullable|string',
            'date_of_purchased' => 'nullable|date',
            'date_of_production' => 'nullable|date',
            'date_of_birth' => 'nullable|date',
            'gender' => 'required|',
            'estimated_live_weight' => 'nullable|integer',
            'transition_cost' => 'nullable|numeric',
            'labour_cost' => 'nullable|',
            'status_type' => 'required|string',
            'color_id' => 'nullable|string',
            'supplier_id' => 'nullable|string',
            'type_id' => 'nullable|string',
            'shade_id' => 'nullable|string',
            'is_purchased' => 'required|string',
        ]);

        $cow->name = $request->name;
        $cow->date_of_purchased = $request->date_of_purchased;
        $cow->date_of_production = $request->date_of_production;
        $cow->date_of_birth = $request->date_of_birth;
        $cow->gender = $request->gender;
        $cow->estimated_live_weight = $request->estimated_live_weight;
        $cow->transition_cost = $request->transition_cost;
        $cow->labour_cost = $request->labour_cost;
        $cow->status_type = $request->status_type;
        $cow->color_id = $request->color_id;
        $cow->supplier_id = $request->supplier_id;
        $cow->type_id = $request->type_id;
        $cow->shade_id = $request->shade_id;
        $cow->is_purchased = $request->is_purchased;

        $cow->save();

        $cow_Id = $cow->id;

        if ($request->hasFile('cow_images')) {
            $images = request()->file('cow_images');
            foreach ($images as $image) {
                $imageModel = new CowImage();
                $imageUrl = $image->storeAs('public/cow/images', $image->getClientOriginalName());
                $imageModel->cow_Id = $cow_Id;
                $imageModel->image = Storage::url($imageUrl);
                $imageModel->save();
            }
        }
    }

    public function deleteImage(CowImage $cowImage)
    {
        $cowImage->delete();
        return redirect()->back()->with(['message' => 'Image deleted successfully!', 'alert-type' => 'success']);
    }
}
