<?php

namespace App\Http\Controllers\Staff;

use Carbon\Carbon;
use App\Models\FeedData;
use App\Models\FeedItem;
use App\Models\AssignTask;
use Illuminate\Http\Request;
use App\Models\AssignCowToStaff;
use App\Http\Controllers\Controller;
use App\Models\AssignCowToStaffList;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::today();
        // $date = Carbon::yesterday();
        // $date = Carbon::create("2022-08-30"); // to check for other days //this is for testing purpose
        // dd($date);

        $assigned = AssignCowToStaff::whereDate('created_at', $date)->where('staff_id', auth()->user()->id)->first();
        // dd($assigned);

        return view("website.pages.staff.feed.index", compact("assigned", "date"));
    }

    public function feedData($assign_id, $column, $table_type, $cow_id, $date)
    {
        // dd("Hello");
        // dd($date);
        // $date = Carbon::today();
        $cow_data = AssignCowToStaffList::where([
            [$column, $cow_id],
            ['assign_id', $assign_id],
            ['type', $table_type],
        ])->whereDate('created_at', $date)->first();

        // dd($cow_data);

        $feed_items = FeedItem::all();

        return view("website.pages.staff.feed.feed_data", compact('cow_data', 'feed_items', 'column', 'assign_id', 'cow_id', 'table_type', 'date'));
    }

    public function saveFeedData(Request $request)
    {
        // dd($request);
        // $dataValidate = $request->validate([
        //     'unit*' => 'required'
        // ]);
        // $today_date = Carbon::now()->toDateString();
        foreach ($request->feeded as $key => $value) {
            $feedData = FeedData::updateOrInsert(
                [$request->column => $request->cow_id, 'feeded_by' => auth()->user()->id, 'item_id' => $key, 'type' => $request->table_type, 'assign_id' => $request->assign_id, 'date' => $request->date],
                ['quantity' => $value]
            );
        }

        return redirect()->route("feed.index")->with(['message' => 'Feed data inserted successfully!', 'alert-type' => 'success']);
    }

    public function changeBathStatus(Request $request)
    {
        $obj = AssignTask::find($request->id);
        $obj->bath_status = $request->status;
        $obj->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
