<?php

namespace App\Http\Livewire\Admin\Cow;

use App\Models\Cow;
use Livewire\Component;
use App\Models\CowImage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use  WithFileUploads;
    public $colors, $suppliers, $cowTypes, $shades;
    public $name,
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

    public $disabled = true,
        $show = true,
        $purchased = 0;

    protected $rules = [
        'name' => 'nullable|string',
        'primary_image' => '|max:4096',
        'images.*' => '|max:4096',
        'date_of_purchased' => 'nullable|date',
        'date_of_production' => 'nullable|date',
        'date_of_birth' => 'nullable|date',
        'gender' => 'required|',
        'estimated_live_weight' => 'nullable|integer',
        'transition_cost' => 'nullable|numeric',
        'labour_cost' => 'nullable|',
        'color_id' => 'nullable|string',
        'supplier_id' => 'nullable|string',
        'type_id' => 'nullable|string',
        'shade_id' => 'nullable|string',
        'is_purchased' => 'required|string',
    ];

    public function updatedIspurchased()
    {
        if ($this->is_purchased == 1) {
            $this->disabled = false;
            $this->purchased = 1;
        } else {
            $this->disabled = true;
            $this->purchased = 2;
        }
    }

    public function saveData()
    {
        $data = $this->validate();

        $cow = new Cow();
        $cow->name = $data['name'];
        if ($this->primary_image) {
            $primary_imageUrl = $this->primary_image->store('public/cow');
            $cow->primary_image = Storage::url($primary_imageUrl);
        }
        $cow->date_of_purchased = $data['date_of_purchased'];
        $cow->date_of_production = $data['date_of_production'];
        $cow->date_of_birth = $data['date_of_birth'];
        $cow->gender = $data['gender'];
        $cow->estimated_live_weight = $data['estimated_live_weight'];
        $cow->breed_percentage = $data['breed_percentage'];
        $cow->transition_cost = $data['transition_cost'];
        $cow->labour_cost = $data['labour_cost'];
        $cow->color_id = $data['color_id'];
        $cow->supplier_id = $data['supplier_id'];
        $cow->shade_id = $data['shade_id'];
        $cow->is_purchased = $data['is_purchased'];

        $cow->save();

        if ($this->images) {
            // dd($cow->id);
            foreach ($this->images as $key => $image) {
                $imageUrl = $image->store('public/cow/gallery');

                $cowImage = new CowImage();
                $cowImage->cow_id = $cow->id;
                $cowImage->image =  Storage::url($imageUrl);
                $save = $cowImage->save();
            }
        }

        return redirect()->route('cow.index')->with(['message' => 'Cow created successfully!', 'alert-type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.cow.create');
    }
}
