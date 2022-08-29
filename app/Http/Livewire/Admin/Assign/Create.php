<?php

namespace App\Http\Livewire\Admin\Assign;

use Carbon\Carbon;
use App\Models\Cow;
use App\Models\Bull;
use App\Models\calf;
use Livewire\Component;
use App\Models\AssignCowToStaff;
use App\Models\AssignCowToStaffList;

class Create extends Component
{
    public $cowTypes,
        $users,
        $cows,
        $bulls,
        $calves;

    public $cowType,
        $cow,
        $staff_id,
        $bull,
        $calf;

    protected $rules = [
        'staff_id' => 'required',
        'cow' => 'required'
    ];

    public function saveData()
    {
        $data = $this->validate();

        $assign = new AssignCowToStaff();
        $assign->staff_id = $data['staff_id'];
        $assign->save();
        $assign_id = $assign->id;

        foreach ($data['cow'] as $key => $value) {
            $type = substr($value, 0, 1);
            $id = substr($value, 1);
            // dd($key, $value, $type, $id);
            $assignList = new AssignCowToStaffList();
            $assignList->assign_id = $assign_id;
            $assignList->type = $type;

            if ($type == 1) {
                $assignList->cow_id = $id;
            } elseif ($type == 2) {
                $assignList->bull_id = $id;
            } elseif ($type == 3) {
                $assignList->calf_id = $id;
            }

            $assignList->save();
        }
        return redirect()->route("assign-cow-to-staff.index")->with(['message' => 'Assigning to staff successfully!', 'alert-type' => 'success']);
    }

    public function mount()
    {
        $date = Carbon::today();
        // $date = Carbon::create("2022-08-30"); // to check for other days //this is for testing purpose

        $assignedCows = AssignCowToStaffList::whereDate('created_at', $date)->where('type', 1)->get();
        if (count($assignedCows) != 0) {
            $cowIds = [];
            foreach ($assignedCows as $key => $assignedCow) {
                array_push($cowIds, $assignedCow->cow_id);
            }
            $this->cows = Cow::all()->except($cowIds);
        } else {
            $this->cows = Cow::all();
        }

        $assignedBulls = AssignCowToStaffList::whereDate('created_at', $date)->where('type', 2)->get();
        // dd($assignedBulls);
        if (count($assignedBulls) != 0) {
            $bullIds = [];
            foreach ($assignedBulls as $key => $assignedBull) {
                array_push($bullIds, $assignedBull->bull_id);
            }
            $this->bulls = Bull::all()->except($bullIds);
        } else {
            $this->bulls = Bull::all();
        }

        $assignedCalves = AssignCowToStaffList::whereDate('created_at', $date)->where('type', 3)->get();
        if (count($assignedCalves) != 0) {
            $calfIds = [];
            foreach ($assignedCalves as $key => $assignedCalf) {
                array_push($calfIds, $assignedCalf->calf_id);
            }
            $this->calves = calf::all()->except($calfIds);
        } else {
            $this->calves = calf::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.assign.create');
    }
}
