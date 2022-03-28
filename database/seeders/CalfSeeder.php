<?php

namespace Database\Seeders;

use App\Models\calf;
use Illuminate\Database\Seeder;

class CalfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        calf::factory()->count(5)->create();
    }
}
