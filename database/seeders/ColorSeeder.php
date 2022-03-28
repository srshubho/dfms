<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    private $colors = ["Black","Brown","Black and White"];
    private function getColorCode($color){
        if(strpos($color,"and")){
            $pos = strpos($color, "and");
            $first = substr($color, 0, 1);
            $second = substr($color, $pos+4, 1);
            return strtoupper($first.'&'.$second);
        }else{
            return strtoupper(substr($color,0,2));
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<count($this->colors);$i++){
            DB::table('colors')->insert([
                "name" => $this->colors[$i],
                "code" => $this->getColorCode($this->colors[$i]),

            ]);
        }
    }
}
