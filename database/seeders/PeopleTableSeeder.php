<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PeopleTableSeeder extends Seeder
{
    /**
     * Seed the people table with fake data.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // Using Persian locale

        // Retrieve all user IDs
        $userIds = User::pluck('id')->toArray();

        $people = [];
        for ($i = 0; $i < 500; $i++) {
            $people[] = [
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'father_name' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'tazkira_number' => $faker->uuid,
                'actual_address' => $faker->address,
                'current_address' => $faker->address,
                'crime_case' => $faker->word,
                'ariza' => $faker->word,
                'subject_crim' => $faker->word,
                'crim_date' => $faker->date,
                'user_id' => $faker->randomNumber(),
                'Created_by' => $faker->randomElement($userIds), // Assign a random user ID
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('people')->insert($people);
    }
}
