<?php

namespace App\Http\Controllers\Website;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::paginate(10);
        return view('website.pages.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color();
        $this->dataStore($request, $color);

        return redirect()->route('color.index')->with(['message' => 'Color added successfully!', 'alert-type' => 'success']);
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
    public function edit(Color $color)
    {
        return view('website.pages.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $this->dataStore($request, $color);

        return redirect()->route('color.index')->with(['message' => 'Color update successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->back()->with(['message' => 'Color deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $color)
    {
        $dataValidate = $request->validate([
            'color_name' => 'required'
        ]);

        $color->color_name = $request->color_name;
        $color->color_code = $this->getColorCode($request->color_name);

        $color->save();
    }

    private function getColorCode($color)
    {
        if (strpos($color, "and")) {
            $pos = strpos($color, "and");
            $first = substr($color, 0, 1);
            $second = substr($color, $pos + 4, 1);
            return strtoupper($first . '&' . $second);
        } else {
            return strtoupper(substr($color, 0, 2));
        }
    }
}
