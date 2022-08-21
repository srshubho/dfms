<?php

namespace App\Http\Livewire\Admin\Cow;

use App\Models\Cow;
use Livewire\Component;

class Create extends Component
{
    public $colors, $suppliers, $cowTypes, $shades;
    public $cow_name,
        $cow_images,
        $cow_date_of_purchased,
        $cow_date_of_production,
        $cow_date_of_birth,
        $cow_gender,
        $cow_estimated_live_weight,
        $cow_transaction_cost,
        $cow_labour_cost,
        $cow_color_id,
        $cow_supplier_id,
        $cow_type_id,
        $cow_shade_id,
        $is_purchased;

    public $disabled = true,
        $show = true,
        $purchased = true;

    protected $rules = [
        'cow_name' => 'nullable|string',
        'cow_date_of_purchased' => 'nullable|date',
        'cow_date_of_production' => 'nullable|date',
        'cow_date_of_birth' => 'nullable|date',
        'cow_gender' => 'required|',
        'cow_estimated_live_weight' => 'nullable|integer',
        'cow_transaction_cost' => 'nullable|numeric',
        'cow_labour_cost' => 'nullable|',
        'cow_color_id' => 'nullable|string',
        'cow_supplier_id' => 'nullable|string',
        'cow_type_id' => 'nullable|string',
        'cow_shade_id' => 'nullable|string',
        'is_purchased' => 'required|string',
    ];

    public function updatedIspurchased()
    {
        if ($this->is_purchased == 1) {
            $this->disabled = false;
            $this->purchased = false;
        } else {
            $this->disabled = true;
            $this->purchased = true;
        }
    }

    public function saveData()
    {
        $data = $this->validate();

        $cow = new Cow();
        $cow->cow_name = $data['cow_name'];
        $cow->cow_date_of_purchased = $data['cow_date_of_purchased'];
        $cow->cow_date_of_production = $data['cow_date_of_production'];
        $cow->cow_date_of_birth = $data['cow_date_of_birth'];
        $cow->cow_gender = $data['cow_gender'];
        $cow->cow_estimated_live_weight = $data['cow_estimated_live_weight'];
        $cow->cow_transaction_cost = $data['cow_transaction_cost'];
        $cow->cow_labour_cost = $data['cow_labour_cost'];
        $cow->cow_color_id = $data['cow_color_id'];
        $cow->cow_supplier_id = $data['cow_supplier_id'];
        $cow->cow_type_id = $data['cow_type_id'];
        $cow->cow_shade_id = $data['cow_shade_id'];
        $cow->is_purchased = $data['is_purchased'];

        $cow->save();
    }

    public function render()
    {
        return view('livewire.admin.cow.create');
    }
}
