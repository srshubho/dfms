<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;


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
            ColorSeeder::class,
            SupplierSeeder::class,
            CowSeeder::class,
            CalfSeeder::class,
        ]);
    }
}
