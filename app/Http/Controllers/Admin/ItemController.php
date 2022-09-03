<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeedItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeditems = FeedItem::paginate(10);
        return view('website.pages.feeditem.index', compact('feeditems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.pages.feeditem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feeditem = new FeedItem();
        $this->dataStore($request, $feeditem);

        return redirect()->route('feeditem.index')->with(['message' => 'FeedItem added successfully!', 'alert-type' => 'success']);
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
    public function edit(FeedItem $feeditem)
    {
        return view('website.pages.feeditem.edit', compact('feeditem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedItem $feeditem)
    {
        $this->dataStore($request, $feeditem);

        return redirect()->route('feeditem.index')->with(['message' => 'FeedItem updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedItem $feeditem)
    {
        $feeditem->delete();
        return redirect()->back()->with(['message' => 'FeedItem deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $feeditem)
    {
        $dataValidate = $request->validate([
            'item_name' => 'required'
        ]);

        $feeditem->item_name = $request->item_name;

        $feeditem->save();
    }
}
