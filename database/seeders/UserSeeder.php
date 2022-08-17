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
                'contact' => '01521343446',
                'is_admin' => 1,
                'user_type' => 1,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@app.com',
                'contact' => '01521343427',
                'is_admin' => 1,
                'user_type' => 1,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Staff 1',
                'email' => 'staff@app.com',
                'contact' => '01521343418',
                'is_admin' => 0,
                'user_type' => 2,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Staff 2',
                'email' => 'staff2@app.com',
                'contact' => '01421343449',
                'is_admin' => 0,
                'user_type' => 2,
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($user as $user) {
            User::create($user);
        }
    }
}
