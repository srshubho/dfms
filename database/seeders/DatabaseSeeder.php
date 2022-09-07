<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Database\Seeders\CowSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CalfSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\VaccineSeeder;
use Database\Seeders\SupplierSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ColorSeeder::class,
            SupplierSeeder::class,
            CowSeeder::class,
            CalfSeeder::class,
            BreedSeeder::class,
            CowTypeSeeder::class,
            ShadeSeeder::class,
            BullSeeder::class,
            VaccineSeeder::class
        ]);
    }
}
