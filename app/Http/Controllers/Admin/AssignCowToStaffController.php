<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Cow;
use App\Models\Bull;
use App\Models\calf;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AssignCowToStaff;
use App\Http\Controllers\Controller;
use App\Models\AssignCowToStaffList;
use App\Models\AssignTask;

class AssignCowToStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->query('check'));
        $check = false;
        if ($request->query()) {
            $date = Carbon::create($request->query('check'));
            $check = true;
            $assignCowToStaffs = AssignCowToStaff::whereDate('created_at', $date)->get();
        } else {
            $date = Carbon::today();
            $assignCowToStaffs = AssignCowToStaff::whereDate('created_at', $date)->get();
        }

        return view('website.pages.assign_to_staff.index', compact('assignCowToStaffs', 'date', 'check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::today();
        // $date = Carbon::create("2022-08-30"); // to check for other days //this is for testing purpose

        $assignedUsers = AssignCowToStaff::whereDate('created_at', $date)->get();
        if (count($assignedUsers) != 0) {
            $ids = [];
            foreach ($assignedUsers as $key => $assignedUser) {
                array_push($ids, $assignedUser->staff_id);
            }
            $users = User::where('user_type', 3)->get()->except($ids);
        } else {
            $users = User::where('user_type', 3)->get();
        }

        return view('website.pages.assign_to_staff.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assignCowToStaff = new AssignCowToStaff();
        $this->dataStore($request, $assignCowToStaff);

        return redirect()->route('assign_cow_to_staff.index')->with(['message' => 'Breed added successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AssignCowToStaff $assignCowToStaff)
    {
        $date = Carbon::today();
        return view('website.pages.assign_to_staff.show', compact('assignCowToStaff', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignCowToStaff $assignCowToStaff)
    {
        $date = Carbon::today();
        // $date = Carbon::create("2022-08-30"); // to check for other days //this is for testing purpose

        $assignedUsers = AssignCowToStaff::whereDate('created_at', $date)->get();
        if (count($assignedUsers) != 0) {
            $ids = [];
            foreach ($assignedUsers as $key => $assignedUser) {
                array_push($ids, $assignedUser->staff_id);
            }
            $users = User::where('user_type', 3)->get()->except($ids);
        } else {
            $users = User::where('user_type', 3)->get();
        }

        $assignedCows = AssignCowToStaffList::whereDate('created_at', $date)->where('type', 1)->get();
        if (count($assignedCows) != 0) {
            $cowIds = [];
            foreach ($assignedCows as $key => $assignedCow) {
                array_push($cowIds, $assignedCow->cow_id);
            }
            $cows = Cow::all()->except($cowIds);
        } else {
            $cows = Cow::all();
        }

        $assignedBulls = AssignCowToStaffList::whereDate('created_at', $date)->where('type', 2)->get();
        if (count($assignedBulls) != 0) {
            $bullIds = [];
            foreach ($assignedBulls as $key => $assignedBull) {
                array_push($bullIds, $assignedBull->bull_id);
            }
            $bulls = Bull::all()->except($bullIds);
        } else {
            $bulls = Bull::all();
        }

        $assignedCalves = AssignCowToStaffList::whereDate('created_at', $date)->where('type', 3)->get();
        if (count($assignedCalves) != 0) {
            $calfIds = [];
            foreach ($assignedCalves as $key => $assignedCalf) {
                array_push($calfIds, $assignedCalf->calf_id);
            }
            $calves = calf::all()->except($calfIds);
        } else {
            $calves = calf::all();
        }

        return view('website.pages.assign_to_staff.edit', compact('assignCowToStaff', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignCowToStaff $assignCowToStaff)
    {
        $this->dataStore($request, $assignCowToStaff);

        return redirect()->route('assign_cow_to_staff.index')->with(['message' => 'Breed update successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignCowToStaff $assignCowToStaff)
    {
        $assignedLists = AssignCowToStaffList::whereDate('created_at', $assignCowToStaff->created_at)
            ->where('assign_id', $assignCowToStaff->id)->get();
        $assignedLists->each->delete();
        $assignCowToStaff->delete();
        return redirect()->back()->with(['message' => 'Deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $assignCowToStaff)
    {
        $dataValidate = $request->validate([
            'breed_name' => 'required'
        ]);

        $assignCowToStaff->breed_name = $request->breed_name;

        $assignCowToStaff->save();
    }

    public function assigntask(Request $request, $assign_id)
    {
        // COW
        if ($request->cowids) {
            foreach ($request->cowids as $key => $value) {
                foreach ($request->cow as $cowKey => $cowValue) {
                    $this->assignTaskValue('cow_id', 1, $cowKey, $key, $cowValue, $assign_id);
                }
            }
        }

        // BULL
        if ($request->bullids) {
            foreach ($request->bullids as $key => $value) {
                foreach ($request->bull as $bullKey => $bullValue) {
                    $this->assignTaskValue('bull_id', 2, $bullKey, $key, $bullValue, $assign_id);
                }
            }
        }

        // COW
        if ($request->calfids) {
            foreach ($request->calfids as $key => $value) {
                foreach ($request->calf as $calfKey => $calfValue) {
                    $this->assignTaskValue('calf_id', 3, $calfKey, $key, $calfValue, $assign_id);
                }
            }
        }

        return redirect()->route("assign-cow-to-staff.show", $assign_id)->with(['message' => 'Task assigned successfully!', 'alert-type' => 'success']);
    }

    public function assignTaskValue($table_name, $table_type, $cowKey, $key, $cowValue, $assign_id)
    {
        $cowId = substr($cowKey, 4);
        $taskname = substr($cowKey, 0, 4);
        if ($key == $cowId) {
            $today_date = Carbon::now()->toDateString();

            if ($taskname == "feed") {
                $feed_time = $cowValue;
                if ($feed_time) {
                    $this->updateOrInsertAssignTask($table_name, $cowId, 'feeding_time', $table_type, $assign_id, $today_date, $feed_time);
                }
            } elseif ($taskname == "bath") {
                $bath_time = $cowValue;
                if ($bath_time) {
                    $this->updateOrInsertAssignTask($table_name, $cowId, 'bath_time', $table_type, $assign_id, $today_date, $bath_time);
                }
            }
        }
    }

    public function updateOrInsertAssignTask($table_name,  $cowId, $column, $type, $assign_id, $today_date, $time)
    {
        return AssignTask::updateOrInsert(
            [$table_name => $cowId, 'type' => $type, 'assign_id' => $assign_id, 'date' => $today_date],
            [$column => $time]
        );
    }
}
