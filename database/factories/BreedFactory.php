<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    private $breeds = ["sindhi", "jersy"];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        foreach ($this->breeds as $value) {
            
            return [
                'breed_name' => $value,
            ];
          }
    }
}
