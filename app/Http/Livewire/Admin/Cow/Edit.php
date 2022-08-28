<?php

namespace App\Http\Livewire\Admin\Cow;

use App\Models\Cow;
use Livewire\Component;
use App\Models\CowImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use  WithFileUploads;
    public $cow;
    public $colors, $suppliers, $shades;
    public $name,
        $prev_image,
        $primary_image,
        $images,
        $date_of_purchased,
        $date_of_production,
        $date_of_birth,
        $gender,
        $estimated_live_weight,
        $transition_cost,
        $labour_cost,
        $purchased_price,
        $color_id,
        $supplier_id,
        $type_id,
        $shade_id,
        $is_purchased;

    public $purchased = 0;

    public function updatedIspurchased()
    {
        if ($this->is_purchased == 1) {
            $this->purchased = 1;
        } else {
            $this->purchased = 2;
        }
    }

    protected $rules = [
        'name' => 'nullable|string',
        'primary_image' => '|max:4096',
        'images.*' => '|max:4096',
        'date_of_purchased' => 'nullable|date',
        'date_of_production' => 'nullable|date',
        'date_of_birth' => 'nullable|date',
        'gender' => 'required|',
        'estimated_live_weight' => 'nullable|integer',
        'breed_percentage' => 'nullable|integer',
        'transition_cost' => 'nullable|numeric',
        'labour_cost' => 'nullable|',
        'color_id' => 'nullable|numeric',
        'supplier_id' => 'nullable|numeric',
        'type_id' => 'nullable|numeric',
        'shade_id' => 'nullable|numeric',
        'is_purchased' => 'required|string',
    ];

    public function saveData()
    {
        $data = $this->validate();

        $this->cow->name = $data['name'];
        if ($this->primary_image) {
            $primary_imageUrl = $this->primary_image->store('public/cow');
            $this->cow->primary_image = Storage::url($primary_imageUrl);
        }
        $this->cow->date_of_purchased = $data['date_of_purchased'];
        $this->cow->date_of_production = $data['date_of_production'];
        $this->cow->date_of_birth = $data['date_of_birth'];
        $this->cow->gender = $data['gender'];
        $this->cow->estimated_live_weight = $data['estimated_live_weight'];
        $this->cow->breed_percentage = $data['breed_percentage'];
        $this->cow->transition_cost = $data['transition_cost'];
        $this->cow->labour_cost = $data['labour_cost'];
        $this->cow->color_id = $data['color_id'];
        $this->cow->supplier_id = $data['supplier_id'];
        $this->cow->shade_id = $data['shade_id'];
        $this->cow->is_purchased = $data['is_purchased'];

        $this->cow->save();

        if ($this->images) {
            foreach ($this->images as $key => $image) {
                $imageUrl = $image->store('public/cow/gallery');

                $cowImage = new CowImage();
                $cowImage->cow_id = $this->cow->id;
                $cowImage->image =  Storage::url($imageUrl);
                $save = $cowImage->save();
            }
        }

        return redirect()->route('cow.index')->with(['message' => 'Cow updated successfully!', 'alert-type' => 'success']);
    }

    public function mount()
    {
        $this->name = $this->cow->name;
        $this->prev_image = $this->cow->primary_image;
        $this->gender = $this->cow->gender;
        $this->date_of_birth = $this->cow->date_of_birth;
        $this->date_of_production = $this->cow->date_of_production;
        $this->estimated_live_weight = $this->cow->estimated_live_weight;
        $this->estimated_price = $this->cow->estimated_price;
        $this->breed_percentage = $this->cow->breed_percentage;
        $this->date_of_purchased = $this->cow->date_of_purchased;
        $this->purchased_price = $this->cow->purchased_price;
        $this->transition_cost = $this->cow->transition_cost;
        $this->labour_cost = $this->cow->labour_cost;
        $this->is_purchased = $this->cow->is_purchased;
        $this->color_id = $this->cow->color_id;
        $this->supplier_id = $this->cow->supplier_id;
        $this->shade_id = $this->cow->shade_id;

        if ($this->is_purchased == 1) {
            $this->purchased = 1;
        } else {
            $this->purchased = 2;
        }
    }

    public function render()
    {
        return view('livewire.admin.cow.edit');
    }
}
