<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CalfFactory extends Factory
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
            'name' => $this->faker->randomElement($this->names),
            'date_of_birth' => $this->faker->date(),
            'estimated_live_weight' => rand(50, 100),
            'breed_percentage' => rand(50, 100),
        ];
    }
}
