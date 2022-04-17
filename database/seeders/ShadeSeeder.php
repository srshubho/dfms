<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shade;
use File;

class ShadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Shade::truncate();
  
        $json = File::get("database/data/shade.json");
        $shades = json_decode($json);
  
        foreach ($shades as $key => $value) {
            Country::create([
                "shade_no" => $value->name,
                "shade_area" => $value->shade_area,
                "shade_capacity" => $value->shade_capacity,
                "shade_type" => $value->shade_type
            ]);
        }
    }
}
