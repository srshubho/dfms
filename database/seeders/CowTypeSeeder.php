<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CowType;

class CowTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'type_name' => 'cow',
            ],
            [
                'type_name' => 'bull',
            ],
            [
                'type_name' => 'calf',
            ],
            
        ];
        foreach ($types as $type) {
            CowType::create($type);
        }
    }
}
