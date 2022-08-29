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
use App\Models\CowType;

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

        $cowTypes = CowType::all();
        return view('website.pages.assign_to_staff.create', compact('users', 'cowTypes'));
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
    public function edit(AssignCowToStaff $assignCowToStaff)
    {
        return view('website.pages.assign_to_staff.edit', compact('assignCowToStaff'));
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
        $assignCowToStaff->delete();
        return redirect()->back()->with(['message' => 'Breed deleted successfully!', 'alert-type' => 'success']);
    }

    public function dataStore($request, $assignCowToStaff)
    {
        $dataValidate = $request->validate([
            'breed_name' => 'required'
        ]);

        $assignCowToStaff->breed_name = $request->breed_name;

        $assignCowToStaff->save();
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
