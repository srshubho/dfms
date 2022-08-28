<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Shade;


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
 
        $shades = [
            [
                'shade_no' => '01',
                'shade_area' => 1500,
                'shade_capacity' =>10 ,
                 

            ],
            [
                'shade_no' => '02',
                'shade_area' => 1200,
                'shade_capacity' => 15,
                 

            ],
            [
                'shade_no' => '03',
                'shade_area' => 1500,
                'shade_capacity' => 10,
                 

            ],
            [
                'shade_no' => '04',
                'shade_area' => 1500,
                'shade_capacity' => 10,
                 

            ],
            [
                'shade_no' => '05',
                'shade_area' => 1200,
                'shade_capacity' => 15,
                 

            ],
            [
                'shade_no' => '06',
                'shade_area' => 1500,
                'shade_capacity' => 10,
                 



            ],
        ];
  
        foreach ($shades as $shade) {
            Shade::create($shade);
        }
    }

}
