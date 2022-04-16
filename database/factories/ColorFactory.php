<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
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
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->randomElement($this->colors);
        return [
            'color_name' => $name ,
            'color_code' => $this->getColorCode($name),
        ];
    }
}
