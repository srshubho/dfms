<?php

namespace App\Http\Livewire\Admin\Assign;

use App\Models\Cow;
use App\Models\Bull;
use App\Models\calf;
use Livewire\Component;
use App\Models\AssignCowToStaff;

class Create extends Component
{
    public $cowTypes,
        $users,
        $cows;

    public $cowType,
        $cow,
        $staff_id,
        $bull,
        $calf;

    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function updatedCowType($value)
    {
        // dd($value);
        if ($value == 1) {
            $this->cows = Cow::all();
        } elseif ($value == 2) {
            $this->cows = Bull::all();
        } elseif ($value == 3) {
            $this->cows = calf::all();
        }
    }

    protected $rules = [
        'staff_d' => 'required',
        'cowType.0' => 'required',
        'cow.0' => 'required',
        'cowType.*' => 'nullable',
        'cow.*' => 'nullable',
    ];

    public function saveData()
    {
        $data = $this->validate();

        foreach ($this->name as $key => $value) {
            dd($this->name, $key, $value);
            AssignCowToStaff::create(
                [
                    'name' => $this->name[$key],
                    'email' => $this->email[$key]
                ]
            );
        }

        dd("hello");
    }

    public function render()
    {
        return view('livewire.admin.assign.create');
    }
}
