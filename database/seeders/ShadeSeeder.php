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
        Shade::unguard();

		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Shade::truncate();
  
        // $json = Storage::disk('local')->get('/data/shade.json');
        $json = file_get_contents('storage/app/data/shade.json');
        $contents = utf8_encode($json);
        $shades = json_decode($contents,true);
  
        foreach ($shades as $shade) {
            Shade::query()->updateOrCreate([
                'shade_no' => $shade['shade_no'],
                'shade_area' => $shade['shade_area'],
                'shade_capacity' => $shade['shade_capacity'],
                'shade_type' => $shade['shade_type'],
            ]);
        }
    }

}
