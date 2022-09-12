<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cow;
use App\Models\Bull;
use App\Models\calf;
use App\Models\FeedItem;
use Illuminate\Http\Request;
use App\Models\CowFeedItemAndUnit;
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
    public function show(FeedItem $feeditem)
    {
        $cows = Cow::all();
        $calves = calf::all();
        $bulls = Bull::all();
        // dd($cows, $calves, $bulls);
        return view('website.pages.feeditem.feed_item', compact('feeditem', 'cows', 'calves', 'bulls'));
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

    public function feedunit(Request $request)
    {
        $this->commonFeedUnitFunction($request->item_unit_cow, $request->feed_item_id, "cow");
        $this->commonFeedUnitFunction($request->item_unit_bull, $request->feed_item_id, "bull");
        $this->commonFeedUnitFunction($request->item_unit_calf, $request->feed_item_id, "calf");
        return redirect()->back()->with(['message' => 'FeedItem with unit inserted successfully!', 'alert-type' => 'success']);
    }

    public function commonFeedUnitFunction($item_unit, $feed_item_id, $name)
    {
        foreach ($item_unit as $key => $item_unit_cow) {
            if ($name == "cow") {
                CowFeedItemAndUnit::updateOrInsert(
                    ["feed_item_id" => $feed_item_id, "cow_id" => $key],
                    ["unit" => $item_unit_cow]
                );
            } elseif ($name == "bull") {
                CowFeedItemAndUnit::updateOrInsert(
                    ["feed_item_id" => $feed_item_id, "bull_id" => $key],
                    ["unit" => $item_unit_cow]
                );
            } elseif ($name == "calf") {
                CowFeedItemAndUnit::updateOrInsert(
                    ["feed_item_id" => $feed_item_id, "calf_id" => $key],
                    ["unit" => $item_unit_cow]
                );
            }
        }
    }
}
