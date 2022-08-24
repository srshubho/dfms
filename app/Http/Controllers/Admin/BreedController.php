<?php

namespace App\Http\Controllers\Admin;

use App\Models\Breed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::paginate(10);
        return view('website.pages.breed.index', compact('breeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.pages.breed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $breed = new Breed();
        $this->dataStore($request, $breed);

        return redirect()->route('breed.index')->with(['message' => 'Breed added successfully!', 'alert-type' => 'success']);
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
    public function edit(Breed $breed)
    {
        return view('website.pages.breed.edit', compact('breed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breed $breed)
    {
        $this->dataStore($request, $breed);

        return redirect()->route('breed.index')->with(['message' => 'Breed update successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breed $breed)
    {
        $breed->delete();
        return redirect()->back()->with(['message' => 'Breed deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $breed)
    {
        $dataValidate = $request->validate([
            'breed_name' => 'required'
        ]);

        $breed->breed_name = $request->breed_name;

        $breed->save();
    }

    private function getBreedCode($breed)
    {
        if (strpos($breed, "and")) {
            $pos = strpos($breed, "and");
            $first = substr($breed, 0, 1);
            $second = substr($breed, $pos + 4, 1);
            return strtoupper($first . '&' . $second);
        } else {
            return strtoupper(substr($breed, 0, 2));
        }
    }
}
