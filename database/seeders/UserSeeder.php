<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'abdullah',
            'email' => 'abdullahhaidary4262@gmail.com',
            'password' => Hash::make('123123123'),
            'type' => 1,
            'action' => 0,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'type' => 1,
            'action' => 0,
        ]);
    }
}
