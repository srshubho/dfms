<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CowFactory extends Factory
{
    private $names = ["lila","megha","madhuri","mousumi","purnima"];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->names),
            'date_of_purchased' => $this->faker->date(),
            'inhouse_or_purchased' => false,
            'transaction_cost' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 5000, $max = 7000),
            'labour_cost' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 1000, $max = 1500),
            'estimated_live_weight' => rand(100,300),
            
        ];
    }
}
