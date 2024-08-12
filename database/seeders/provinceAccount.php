<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\provinceaccount as ModelsProvinceaccount;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class provinceAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fa_IR');

        $districts = District::all();
        $emailCounter = 1;
        foreach ($districts as $district) {
            $user = User::create([
                'name' => $faker->name,
                'email' => 'provinceemail' . $emailCounter . '@crms.com',
                'password' => Hash::make('password'),
                'type' => 2,
                'action' => 0,
            ]);
            $province_user = ModelsProvinceaccount::create([
                'user_id' => $user->id,
                'province' => $district->province_id,
                'district' => $district->id,
            ]);
            $emailCounter++;
        }
    }
}
