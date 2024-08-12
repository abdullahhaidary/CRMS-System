<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SuspectSeeder extends Seeder
{
    /**
     * Seed the suspect table with fake data.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fa_IR'); // Using Persian locale

        $crimeRecordIds = DB::table('crime_register_record_information')->pluck('id'); // Get existing crime_record_ids

        $suspects = [];
        for ($i = 0; $i < 500; $i++) {
            $suspects[] = [
                'crime_record_id' => $faker->randomElement($crimeRecordIds),
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'tazcira_number' => $faker->unique()->numberBetween(100000, 999999),
                'actual_address' => $faker->address,
                'current_address' => $faker->address,
                'father_name' => $faker->firstName,
                'isCriminal' => $faker->boolean ? 1 : 0,
                'Created_by' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('suspect')->insert($suspects);
    }
}
