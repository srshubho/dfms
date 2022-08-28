<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Breed;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $breeds = [
            [
                'breed_name' => 'sindhi',


            ],
            [
                'breed_name' => 'jersey',


            ],
            [
                'breed_name' => 'rathi',


            ],

        ];
  
        foreach ($breeds as $breed) {
            Breed::create($breed);
        }
        
    }
}
