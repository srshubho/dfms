<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'is_admin' => 1,
                'user_type' => 1,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@app.com',
                'is_admin' => 1,
                'user_type' => 1,
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($user as $user) {
            User::create($user);
        }
    }
}
