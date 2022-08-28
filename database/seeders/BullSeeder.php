<?php

namespace Database\Seeders;

use App\Models\Bull;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BullSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bulls = [
            [
                'name' => 'bigshow',
                'breed_percentage' => 70,


            ],
            [
                'name' => 'kalo manik',
                'breed_percentage' => 65,


            ],
            [
                'name' => 'chandu',
                'breed_percentage' => 75,


            ],
            
        ];
        foreach ($bulls as $bull) {
            Bull::create($bull);
        }
    }
}
