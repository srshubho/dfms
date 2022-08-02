<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CowFactory extends Factory
{
    private $names = ["lila", "megha", "madhuri", "mousumi", "purnima"];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cow_name' => $this->faker->randomElement($this->names),
            'cow_date_of_purchased' => $this->faker->date(),
            'cow_transaction_cost' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 5000, $max = 7000),
            'cow_labour_cost' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 1000, $max = 1500),
            'cow_estimated_live_weight' => rand(100, 300),
            'cow_status_type' => "0",
            'is_purchased' => rand(1, 2)

        ];
    }
}
