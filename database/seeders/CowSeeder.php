<?php

namespace Database\Seeders;

use App\Models\Cow;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class CowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Cow::factory()->count(5)->create();
        $cow = [
            [
                'name' => "madhuri",
                'date_of_purchased' => date("Y-m-d"),
                'transition_cost' => 1000,
                'labour_cost' => 500,
                'estimated_live_weight' => 550,
                'is_purchased' => 1
            ],
        
            [
                'name' => "mousumi",
                'date_of_purchased' => date("Y-m-d",strtotime("2022-4-23")),
                'transition_cost' => 1000,
                'labour_cost' => 500,
                'estimated_live_weight' => 550,
                'is_purchased' => 1
            ],
        
            [
                'name' => "lila",
                'date_of_purchased' => date("Y-m-d",strtotime("2021-4-23")),
                'transition_cost' => 1000,
                'labour_cost' => 500,
                'estimated_live_weight' => 500,
                'is_purchased' => 1
            ],
        
            [
                'name' => "lali",
                'date_of_purchased' => date("Y-m-d",strtotime("2022-4-23")),
                'transition_cost' => 1000,
                'labour_cost' => 500,
                'estimated_live_weight' => 650,
                'is_purchased' => 1
            ],
        
            [
                'name' => "koli",
                'date_of_purchased' => date("Y-m-d",strtotime("2022-4-23")),
                'transition_cost' => 1000,
                'labour_cost' => 500,
                'estimated_live_weight' => 550,
                'is_purchased' => 1
            ],
        

       
        ];

        foreach ($cow as $cow) {
            Cow::create($cow);
        }
    }
    }

